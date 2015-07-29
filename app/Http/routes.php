<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ocorre um erro quando clono o repositorio, quando rodo o o composer update gera esse erro:

    // Script php artisan clear-compiled handling the pre-update-cmd event returned with an error

// mas se eu rodo o 'composer update --no-scripts' e depois o composer update funciona
// porem nao roda o trecho scripts do composer.json onde cria o arquivo .env e gera a key do artisan
// desse modo tenho que gerar os comando na mao
// copiar o .env.example e rodar um php artisan key:generate
// sabe o motivo do erro?

Route::get('/', function () {
    return view('welcome');
});

Route::get('client','ClientController@index');

Route::post('client','ClientController@store');

Route::get('client/{id}','ClientController@show');

Route::delete('client/{id}','ClientController@destroy');

Route::put('client/{id}','ClientController@update');
