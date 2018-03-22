<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sintegra;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sintegra = Sintegra::all();
        return view('registros',['registros' => $sintegra]);
    }

    public function consultarCNPJ()
    {
        return view('consultar');
    }

    public function deletar()
    {
        $id = (int) $_GET['id'];

        $produtos = Sintegra::find($id);
        if($produtos->delete()){
             redirect('home')->with('message', 'Registro deletado com sucesso!');
        }

    }
}
