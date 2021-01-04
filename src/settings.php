<?php

use Psr\Container\ContainerInterface;

return function (\DI\Container $container) {
    $container->set('settings', function() {
        return [
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true
        ];
    });
};