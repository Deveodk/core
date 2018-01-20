<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('/', 'SystemController@platformInfo');
