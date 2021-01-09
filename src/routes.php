<?php

use Slim\App;
Use App\Https\Controllers\WelcomeController;
use Psr\Http\Message\ResponseInterface as Response;


return function (App $app) {

    $app->get('/hello/{name}', function (Response $response) {
        $name = 'Haakon';
        return view($response, 'home', compact('name'));
    });

    // Welcome
    $app->get('/', [WelcomeController::class, 'index']);


    // Users
    $app->get('/users', [\App\Https\Controllers\UserController::class, 'index']);
    $app->get('/users/{id}', [\App\Https\Controllers\UserController::class, 'show']);

};