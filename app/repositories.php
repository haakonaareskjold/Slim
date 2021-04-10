<?php

use DI\ContainerBuilder;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        \App\Models\UserRepositoryInterface::class => DI\get(\App\Models\UserRepository::class),
    ]);
};
