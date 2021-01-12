<?php

namespace App;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;

class Helpers
{
    public static function view(Response $response, $template, $with = []): Response
    {
        $cache = __DIR__ . '/../storage/views';
        $views = __DIR__ . '/../resources/views';

        $blade = (new Blade($views, $cache))->make($template, $with);
        $response->getBody()->write($blade->render());
        return $response;
    }
}
