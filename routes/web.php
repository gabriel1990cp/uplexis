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

Route::post('/cnpj', 'ApiController@cnpj')->name('cnpj');

Route::get('/cnpj', 'ApiController@cnpj')->name('cnpj');