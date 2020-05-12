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
    return $router->app->version();
});

$router->post('/register', 'UserController@register');

$router->group(['prefix' => 'secret', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/', function(){
        return "shh. this is a secret area! ( ͡~ ͜ʖ ͡°)";
    });
});

$router->group(['prefix' => 'blogs'], function () use ($router) {
    $router->get('/', 'BlogController@index');
});
