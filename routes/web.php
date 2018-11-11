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

$router->post(
    'auth/login',
    [
        'uses' => 'AuthController@authenticate',
        'middleware' => 'cors'
    ]
);

$router->post(
    'auth/register',
    [
        'uses' => 'AuthController@register',
        'middleware' => 'cors'
    ]
);

$router->post(
    'user/getBasicDetails',
    [
        'uses' => 'UserController@getBasicDetails',
        'middleware' => ['cors', 'jwt.auth']
    ]
);