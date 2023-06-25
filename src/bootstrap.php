<?php

use DI\Bridge\Slim\Bridge as AppFactory;
use DI\ContainerBuilder;
use Slim\Middleware\MethodOverrideMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';


$containerBuilder = new ContainerBuilder();

$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

$entityManager = require __DIR__ . '/../app/entitymanager.php';
$entityManager($containerBuilder);

$repositories = require __DIR__ . '/../app/repositories.php';
$repositories($containerBuilder);


$container = $containerBuilder->build();

// Instantiate the app and Build PHP-DI Container instance
$app = AppFactory::create($container);

// Set up routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

// middleware
$app->addErrorMiddleware(true, true, true);

// routing middleware
$app->addRoutingMiddleware();
$methodOverrideMiddleware = new MethodOverrideMiddleware();
$app->add($methodOverrideMiddleware);
$app->addBodyParsingMiddleware();

// running Slim
$app->run();
