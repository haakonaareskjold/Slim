<?php

use Slim\App;
return function (App $app) {

    // Rerouting to main page
    $app->get('/', \App\Https\Controllers\RerouteController::class);

    // Users
    $app->get('/users', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/create', [\App\Https\Controllers\UserController::class, 'create']);
    $app->post('/users', [\App\Https\Controllers\UserController::class, 'store']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);

};