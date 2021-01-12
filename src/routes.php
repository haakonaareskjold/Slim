<?php

use Slim\App;

return function (App $app) {

    // Welcome
    $app->get('/', \App\Https\Controllers\WelcomeController::class);

    // Users
    $app->get('/users', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/create', [\App\Https\Controllers\UserController::class, 'create']);
    $app->post('/users', [\App\Https\Controllers\UserController::class, 'store']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);

    $app->addErrorMiddleware(true, true, true);
};