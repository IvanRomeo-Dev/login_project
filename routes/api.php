<?php

/** @var \Laravel\Lumen\Routing\Router $router */
//File che contiene tutte le route per api

$router->group(['prefix'=>'api'],function () use ($router) {
    $router->post('/register','AuthController@register');
    $router->post('/login','AuthController@login');
    $router->post('/logout','AuthController@logout');
    $router->post('/is_logged','AuthController@is_logged');

});
$router->group(['prefix'=>'api','middleware'=>'auth'],function () use ($router) {
    $router->post('/get_info','AuthController@get_info');

});
