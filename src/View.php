<?php

namespace App;

use Psr\Http\Message\ResponseInterface as Response;

class View
{
    public static function render(Response $response, $template, $with = []): Response
    {
        $cache = __DIR__ . '/../storage/views';
        $views = __DIR__ . '/../resources/views';

        $loader = new \Twig\Loader\FilesystemLoader($views);
        $twig = new \Twig\Environment($loader, [
            'cache' => $cache,
        ]);

        $response->getBody()->write($twig->render($template, $with));
        return $response;
    }
}
