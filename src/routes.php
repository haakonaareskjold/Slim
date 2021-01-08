<?php

use Slim\App;
Use App\Https\Controllers\WelcomeController;
use Psr\Http\Message\ResponseInterface as Response;


return function (App $app) {

    $app->get('/', [WelcomeController::class, 'index']);

    $app->get('/hello/{name}', function (Response $response) {
        $name = 'Haakon';
        return view($response, 'home', compact('name'));
    });



};