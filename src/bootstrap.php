<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as AppFactory;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


require_once __DIR__. '/../vendor/autoload.php';


$container = new Container();


$entitymanagerFactory = function () {
// Create a simple "default" Doctrine ORM configuration for Annotations
    $isDevMode = true;
    $proxyDir = null;
    $cache = null;
    $useSimpleAnnotationReader = false;
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ ), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
    $conn = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite',
    );

// obtaining the entity manager
    return EntityManager::create($conn, $config);
};
$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => DI\Factory($entitymanagerFactory)
]);

$container = $containerBuilder->build();

// Instantiate the app and Build PHP-DI Container instance
$app = AppFactory::create($container);


// Set up routes
$routes = require __DIR__ . '/../src/routes.php';
$routes($app);

$app->run();