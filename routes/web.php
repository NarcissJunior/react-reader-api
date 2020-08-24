<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Criando um grupo de rotas onde todas possuem o prefixo 'api'
$router->group(['prefix' => '/api'], function () use ($router) {
    $router->get('characters', 'CharactersController@index');
    $router->get('characters/{id}', 'CharactersController@show');
    $router->put('characters/{id}', 'CharactersController@update');
    $router->delete('characters/{id}', 'CharactersController@destroy');
    $router->post('characters', 'CharactersController@store');
});
