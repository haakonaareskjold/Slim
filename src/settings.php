<?php


return function (\DI\Container $container) {
    $container->set('settings', function() {
        return [
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true
        ];
    });
};