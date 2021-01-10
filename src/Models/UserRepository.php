<?php


namespace App\Models;


use Doctrine\ORM\EntityManagerInterface;

class UserRepository implements UserRepositoryInterface
{

    private EntityManagerInterface $entityManager;

    public function __construct
    (
        EntityManagerInterface $entityManager
    )
    {
        $this->entityManager = $entityManager;
    }

    public function getAllUsers(): array
    {
        return $this->entityManager->getRepository('App\Models\User')->findAll();
    }

    public function getUserById($id): ?object
    {
        return $this->entityManager->find('App\Models\User', $id);
    }

    public function createUser($name)
    {
        $user = new \App\Models\User();
        $user->setName($name['name']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}