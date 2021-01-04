<?php

use Slim\App;
Use App\Https\Controllers\WelcomeController;
use Psr\Http\Message\ResponseInterface as Response;

return function (App $app) {

    $app->get('/home/{name}', function (Response $response) {
        $name = 'Haakon';
        return view($response, 'auth.home', compact('name'));
    });

    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/{name}/{id}', [WelcomeController::class, 'show']);

};