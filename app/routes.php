<?php

use App\Https\Controllers\UserController;
use Slim\App;

return static function (App $app) {
    $app->get('/', [UserController::class, 'index']);
    $app->get('/users/create', [UserController::class, 'create']);
    $app->post('/users', [UserController::class, 'store']);
    $app->get('/users/{id}', [UserController::class, 'show']);
    $app->get('/users/{id}/edit', [UserController::class, 'edit']);
    $app->put('/users/{id}', [UserController::class, 'update']);
    $app->delete('/users/{id}', [UserController::class, 'destroy']);
};
