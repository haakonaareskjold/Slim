<?php

// replace with file to your own project bootstrap
require_once __DIR__. '/../src/bootstrap.php';

$entityManager = $container->get(\Doctrine\ORM\EntityManagerInterface::class);


return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
