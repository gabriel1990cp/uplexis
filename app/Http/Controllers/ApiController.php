<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sintegra;


class ApiController extends Controller
{
    protected function api($cnpj)
    {
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

        $re = '/<td .*?class=".*?">(.*)<\/td>/i';

        preg_match_all($re, $resultado, $matches);


        // Array com dados
        $cliente1 = array(
            'codigo'   => '001',
            'nome'     => 'William',
            'telefone' => '012 9999-6352'
        );

        // Tranforma o array $dados em JSON
        $dados_json = json_encode($cliente1);

        return $dados_json;
    }

    public function cnpj(Request $request)
    {
        if (Auth::check()) {

            $cnpj = $request->input('cnpj');

            $retorno = $this->api($cnpj);

            $this->validate($request, [
                'cnpj' => 'required'
            ]);

            $sintegra = new Sintegra();
            $sintegra->id_usuario = Auth::user()->id;
            $sintegra->cnpj = $cnpj;
            $sintegra->json = $retorno;
            $sintegra->save();
            return redirect('listagem')->with('message', 'Cadastrado realizado com sucesso!');

        }
    }
}
