<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
    return "SNISNI API · Built with " . $router->app->version();
});

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->get('me', 'UserController@me');
    });
});

$router->group(['prefix' => 'blogs'], function () use ($router) {
    $router->get('/', 'BlogController@index');
});

$router->group(['prefix' => 'articles'], function () use ($router) {
    $router->get('/', 'ArticleController@index');
    $router->get('{id}', 'ArticleController@show');
});
