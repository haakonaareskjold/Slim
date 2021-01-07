<?php


namespace App\Https\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class WelcomeController
{
    public function index(Response $response): Response
    {
        $response->getBody()->write('Welcome Controller worked!');

        return view($response, 'app');
    }
}