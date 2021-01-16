<?php


namespace App\Https\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;


class BeforeMiddleware
{

    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $result = $request->withMethod('PUT');
        $response = $handler->handle($result);
        $existingContent = (string) $response->getBody();

        $response = new Response();
        $response->getBody()->write('BEFORE' . $existingContent);

        return $response;
    }
}