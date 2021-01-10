<?php

use Slim\App;
Use App\Https\Controllers\WelcomeController;


return function (App $app) {

    // Welcome
    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/hello/{name}', [WelcomeController::class, 'show']);

    // Users
    $app->get('/users', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);

};