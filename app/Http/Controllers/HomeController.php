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
        return view('home');
    }

    public function listagem()
    {
        echo "chegou!";
        exit();

        $sintegra = Sintegra::all();
        return view('registros',['registros' => $sintegra]);
    }
}
