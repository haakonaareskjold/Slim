<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as AppFactory;

require_once __DIR__. '/../vendor/autoload.php';


$container = new Container();

// Set up settings
$settings = require __DIR__ . '/../src/settings.php';
$settings($container);

$entitymanagerFactory = require __DIR__ . '/../src/entitymanager.php';
$entitymanagerFactory($container);

// Set up routes
$middleware = require __DIR__ . '/../src/middleware.php';
$settings($container);

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => DI\Factory($entitymanagerFactory),
    \Psr\Http\Server\MiddlewareInterface::class => DI\Factory($middleware)
]);

$container = $containerBuilder->build();


// Instantiate the app and Build PHP-DI Container instance
$app = AppFactory::create($container);

// Set up routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->run();