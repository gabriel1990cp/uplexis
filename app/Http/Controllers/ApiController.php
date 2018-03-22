<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sintegra;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    protected function api($cnpj)
    {
        /*
         * Realiza o CURL no site setado na variavel url, faz a consulta e retorna os dados do HTML
         *
         * @access public
         * @param string $cnpj
         * @return json
         */

        $url = 'http://www.sintegra.es.gov.br/resultado.php';

        $campos = array(
            'num_cnpj' => urlencode($cnpj),
            'botao' => urlencode("Consultar")
        );

        $string_campos = '';

        foreach ($campos as $name => $valor) {
            $string_campos .= $name . '=' . $valor . '&';
        }

        $string_campos = rtrim($string_campos, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        curl_setopt($ch, CURLOPT_POST, count($campos));

        curl_setopt($ch, CURLOPT_POSTFIELDS, $string_campos);

        $resultado = curl_exec($ch);

        curl_close($ch);

        $regexTitulo = '/<td (.*)class="titulo"(.*)>(.*)<\/td>/i';

        preg_match_all($regexTitulo, utf8_encode($resultado), $titulo);

        $regexValor = '/<td (.*)class="valor"(.*)>(.*)<\/td>/i';

        preg_match_all($regexValor, utf8_encode($resultado), $valor);

        if (empty($titulo[3])) {

            return false;

        } else {
            $dados = array();

            foreach ($titulo[3] as $key => $row) {
                $dados[$row] = utf8_encode($valor[0][$key]);
            }

            $dados_json = json_encode($dados);

            return $dados_json;
        }
    }

    public function processarCNPJ(Request $request)
    {
        /*
         * Consulta a API e salva o retorno na base de dados
         *
         * @access public
         * @param string $request
         * @return cadastro
         */

        if (Auth::check()) {

            $cnpj = $request->input('cnpj');

            $retorno = $this->api($cnpj);

            $this->validate($request, [
                'cnpj' => 'required'
            ]);

            if ($retorno == false) {
                return redirect('consultarCNPJ')->with('message', 'Ocorreu um erro!');
            }

            $sintegra = new Sintegra();
            $sintegra->id_usuario = Auth::user()->id;
            $sintegra->cnpj = $cnpj;
            $sintegra->json = $retorno;
            $sintegra->save();
            return redirect('home')->with('message', 'Cadastrado realizado com sucesso!');

        } else {
            return redirect('home');
        }
    }

    public function servicoApi($cnpj, $usuario, $senha)
    {
        /*
         * API para terceiros realizar consulta
         *
         * @access public
         * @param string $cnpj,$usuario,$senha
         * @return json
         */

        $senha = $senha;

        $verificaUsuario = DB::table('users')->where('name', strip_tags($usuario))->first();

        if ($verificaUsuario) {

            $retorno = $this->api(strip_tags($cnpj));
            $dados_json = json_encode(strip_tags($retorno));

            return $dados_json;

        } else {

            echo "Verifique os dados de acesso !";

        }

    }
}
