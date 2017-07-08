<?php

/**
 * Routes
 */

$router->get('/v1/users', 'UserController@index');
$router->get('/v1/users/{id}', 'UserController@find');
$router->post('/v1/users', 'UserController@create');
$router->put('/v1/users/{id}', 'UserController@update');
$router->delete('/v1/users/{id}', 'UserController@delete');
