<?php

require_once __DIR__ . '/../../bootstrap.php';

$newUserName = $argv[1];

$user = new \App\Models\User();
$user->setName($newUserName);

$entityManager = $container->get(\Doctrine\ORM\EntityManagerInterface::class);
$entityManager->persist($user);
$entityManager->flush();

echo "Created Product with ID " . $user->getId() . "\n";
