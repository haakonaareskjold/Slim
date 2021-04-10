<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return static function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'doctrine' => [
                // if true, metadata caching is forcefully disabled
                'dev_mode' => true,
                'proxy-dir' => null,
                'cache' => null,
                'useSimpleAnnotationReader' => false,

                // you should add any other path containing annotated entity classes
                'metadata_dirs' => [__DIR__ . '/../src/Models'],

                'connection' => [
                    'driver' => 'pdo_sqlite',
                    'path' => __DIR__ . '/../db.sqlite'
                ]
            ]
        ]
    ]);
};
