<?php

use Slim\App;

return static function (App $app) {
    $app->get('/', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/create', [\App\Https\Controllers\UserController::class, 'create']);
    $app->post('/users', [\App\Https\Controllers\UserController::class, 'store']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);
    $app->get('/users/{id}/edit', [\App\Https\Controllers\UserController::class, 'edit']);
    $app->put('/users/{id}', [\App\Https\Controllers\UserController::class, 'update']);
    $app->delete('/users/{id}', [\App\Https\Controllers\UserController::class, 'destroy']);
};
