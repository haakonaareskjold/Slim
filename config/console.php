<?php

require_once __DIR__ . '/../src/bootstrap.php';

use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands([
    $container->get(App\Console\Users\Create::class),
    $container->get(\App\Console\Users\Destroy::class)
]);

$application->run();
