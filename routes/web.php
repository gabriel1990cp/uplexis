<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listagem', 'HomeController@listagem')->name('listagem');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/consultarCNPJ', 'HomeController@consultarCNPJ')->name('consultarCNPJ');

Route::post('/processarCNPJ', 'ApiController@processarCNPJ')->name('processarCNPJ');

Route::GET('/deletar', 'HomeController@deletar')->name('deletar');

Route::GET('/api/{cnpj}/{usuario}/{senha}', 'ApiController@servicoApi')->name('servicoApi');