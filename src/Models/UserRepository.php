<?php

namespace App\Models;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class UserRepository
 * @package App\Models
 */
class UserRepository implements UserRepositoryInterface
{

    private EntityManagerInterface $entityManager;

    /**
     * @var User
     */
    private User $user;

    public function __construct(
        EntityManagerInterface $entityManager,
        User $user
    ) {
        $this->entityManager = $entityManager;
        $this->user = $user;
    }

    /**
     * @return object|array
     */
    public function getAllUsers()
    {
        $user = $this->entityManager->getRepository('App\Models\User')->findAll();

        if ($user !== null) {
            return $user;
        } else {
            return $user  = [];
        }
    }

    /**
     * @param $id
     * @return object|array
     */
    public function getUserById($id)
    {
        $user = $this->entityManager->find('App\Models\User', $id);

        if ($user !== null) {
            return $user;
        } else {
            return $user  = [];
        }
    }

    public function createUser($name)
    {
        $this->entityManager->persist($this->user->setName($name));
        $this->entityManager->flush();
    }

    public function update(int $id, string $name)
    {
       $user = $this->getUserById($id);

        if (!$user) {
            throw new Exception(
                die('No User found for id '.$id)
            );
        }

        $user->setName(($name));
        $this->entityManager->flush();

    }
}
