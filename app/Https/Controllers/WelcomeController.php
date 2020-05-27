<?php


namespace App\Https\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class WelcomeController
{
    public function index(Response $response)
    {
        $response->getBody()->write('Welcome Controller worked!');

        return $response;
    }

    public function show(Response $response, $name, $id)
    {
        $response->getBody()->write("Welcome {$name} you have an id of {$id}");

        return $response;
    }
}