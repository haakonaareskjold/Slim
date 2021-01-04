<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as AppFactory;

require_once __DIR__. '/../vendor/autoload.php';


$container = new Container();

// Set up settings
$settings = require __DIR__. '/../src/settings.php';
$settings($container);

// Instantiate the app and Build PHP-DI Container instance
$app = AppFactory::create($container);

// Set up middleware
$middleware = require __DIR__. '/../src/middleware.php';
$middleware($app);

// Set up routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->run();