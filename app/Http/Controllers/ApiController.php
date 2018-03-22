<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    protected function api($cnpj)
    {
        header('Content-type: application/json');

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

            $vendedorCad = new VendedorCad();

            $vendedor = $request->input('vendedor');
            $valor_comissao = str_replace_last('.', '',$request->input('valor_comissao'));
            $valor_comissao = str_replace_last(',', '.',$valor_comissao);

            $vendedorCad = $vendedorCad->insert(array('vendedor' => $vendedor, 'valor_comissao' => $valor_comissao));

            if ($vendedorCad)
            {
                return redirect('/');
            }else {
                return redirect('cadastrar');
            }

        }
    }
}
