<?php

namespace App\Https\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class RequestMiddleware
{

    // not in use temporarily
    public function __invoke(Request $request, RequestHandler $handler): ResponseInterface
    {
        $result = [];
        if (str_contains(implode($request->getParsedBody()), 'PUT') === true) {
            $result = $request->withMethod('PUT');
        } elseif (str_contains(implode($request->getParsedBody()), 'DELETE') === true) {
                $result = $request->withMethod('DELETE');
        }

        return $handler->handle($result);
    }
}
