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

$router->get('/', function ()  {
    return view('abc', ['name' => 'James']);
});

$router->get('abc', ['uses' => 'ExampleController@abc']);
$router->post('abc', ['uses' => 'ExampleController@abc']);


/**
 * Routes for resource User
 */
$router->get('user', 'UserController@index');
$router->get('user/{id}', 'UserController@show');
$router->post('user', 'UserController@create');
$router->put('user/{id}', 'UserController@update');
$router->delete('user/{id}', 'UserController@destroy');

//payment
$router->post('payment', 'UserController@payment');
