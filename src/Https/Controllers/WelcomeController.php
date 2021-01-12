<?php


namespace App\Https\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use App\Helpers;

class WelcomeController
{
    public function __invoke(Response $response): Response
    {
        return Helpers::view($response, 'home');
    }
}