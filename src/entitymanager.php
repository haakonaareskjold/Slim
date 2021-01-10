<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

return function () {
    $isDevMode = true;
    $proxyDir = null;
    $cache = null;
    $useSimpleAnnotationReader = false;
    $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ ), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

    $conn = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../db.sqlite',
    );

    return $entitymanagerFactory = EntityManager::create($conn, $config);

};