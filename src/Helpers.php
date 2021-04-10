<?php

namespace App;

use Psr\Http\Message\ResponseInterface as Response;

class Helpers
{
    public static function view(Response $response, $template, $with = []): Response
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

    public static function dd($args): void
    {
        die(dump($args));
    }
}
