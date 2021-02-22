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

$router->get('/', ['as'=>'welcome','uses'=>'WebController@show_welcome']);
$router->get('/register',['as'=>'register','uses'=> 'WebController@show_register']);
$router->get('/profile', ['as'=>'profile','uses'=>'WebController@show_profile']);
