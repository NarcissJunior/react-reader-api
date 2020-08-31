<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|--------------------------------------------------------------------------


Devido ao fato de usarmos o Lumen, as rotas devem ser declarados aqui no web.php
Não é possível declarar uma rota que suporta todos os métodos devido a leveza do framework
Diferente do Laravel onde é possível usar a seguinte sintaxe para todos os métodos:

    Route::Resource('characters', 'CharactersController');

*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Criando um grupo de rotas onde todas possuem o prefixo 'api'
$router->group(['prefix' => '/api'], function () use ($router) {
    $router->group(['prefix' => 'characters'], function () use ($router) {
        $router->get('', 'CharactersController@index');
        $router->get('{id}', 'CharactersController@show');
        $router->put('{id}', 'CharactersController@update');
        $router->delete('{id}', 'CharactersController@destroy');
        $router->post('', 'CharactersController@store');
    });
});
