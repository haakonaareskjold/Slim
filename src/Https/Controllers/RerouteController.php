<?php

namespace App\Https\Controllers;

use Psr\Http\Message\ResponseInterface as Response;

class RerouteController
{
    public function __invoke(Response $response): Response
    {
        return $response->withStatus(302)->withHeader('Location', '/users');
    }
}
