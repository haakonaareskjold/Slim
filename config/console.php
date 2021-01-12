<?php

require_once __DIR__ . '/../src/bootstrap.php';

use App\Console\Users\Create;
use Symfony\Component\Console\Application;

$application = new Application();

$application->addCommands([
    $container->get(Create::class)
]);

$application->run();