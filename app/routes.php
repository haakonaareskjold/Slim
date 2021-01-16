<?php

use Slim\App;

return function (App $app) {
    $app->addRoutingMiddleware();

    // Redirect to users
    $app->redirect('/', '/users', 301);

    // Users
    $app->get('/users', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/create', [\App\Https\Controllers\UserController::class, 'create']);
    $app->post('/users', [\App\Https\Controllers\UserController::class, 'store']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);
    $app->get('/users/{id}/edit', [\App\Https\Controllers\UserController::class, 'edit']);
    $app->post('/users/{id}', [\App\Https\Controllers\UserController::class, 'update'])
        ->add(new \App\Https\Middleware\RequestMiddleware);
    $app->post('/users/{id}/delete', [\App\Https\Controllers\UserController::class, 'destroy'])
        ->add(new \App\Https\Middleware\RequestMiddleware);;

    $app->addBodyParsingMiddleware();
};
