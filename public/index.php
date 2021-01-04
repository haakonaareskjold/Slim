<?php

use DI\Container;

require_once __DIR__ . '/../vendor/autoload.php';


$container = new Container();

$settings = require __DIR__ . '/../src/settings.php';
$settings($container);

$app = \Slim\Factory\AppFactory::create($container);


$middleware = require __DIR__ . '/../src/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->run();

