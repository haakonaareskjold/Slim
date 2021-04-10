<?php

use DI\ContainerBuilder;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return static function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        EntityManagerInterface::class => function (ContainerInterface $c): EntityManager {
            $doctrineSettings = $c->get('settings')['doctrine'];

            $config = Setup::createAnnotationMetadataConfiguration(
                $doctrineSettings['metadata_dirs'],
                $doctrineSettings['dev_mode'],
                $doctrineSettings['useSimpleAnnotationReader'],
            );

             $config->setMetadataDriverImpl(
                 new AnnotationDriver(
                     new AnnotationReader(),
                     $doctrineSettings['metadata_dirs']
                 )
             );

            return EntityManager::create($doctrineSettings['connection'], $config);
        }
    ]);
};
