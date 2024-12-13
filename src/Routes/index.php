<?php

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/menu', HomeController::class, 'menu');
$router->get('/new', HomeController::class, 'new');
$router->post('/store', HomeController::class, 'store');
$router->get('/edit', HomeController::class, 'edit');
$router->post('/update', HomeController::class, 'update');
$router->post('/delete', HomeController::class, 'delete');
$router->get('/description', HomeController::class, 'description');

$router->dispatch();
