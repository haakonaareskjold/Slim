<?php


namespace App\Https\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class WelcomeController
{
    public function __invoke(Response $response): Response
    {
        return view($response, 'home');
    }
}