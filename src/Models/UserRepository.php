<?php

namespace App\Models;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use App\Models\User;

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
     *
     */
    public function getAllUsers()
    {
        $user = $this->entityManager->getRepository(User::class)->findAll();

        return $user ?? [];
    }

    /**
     * @param $id
     * @return object|array
     */
    public function getUserById($id): object | array
    {
        $user = $this->entityManager->find(User::class, $id);

        return $user ?? [];
    }

    public function createUser($name): void
    {
        $this->entityManager->persist($this->user->setName($name));
        $this->entityManager->flush();
    }

    public function update(string $id, string $name): void
    {
        $user = $this->getUserById($id);

        if (!$user) {
            throw new Exception(
                die('No User found for id ' . $id . PHP_EOL)
            );
        }

        $user->setName(($name));
        $this->entityManager->flush();
    }

    public function delete($id): void
    {
        $user = $this->entityManager->find(User::class, $id);

        if (!$user) {
            throw new Exception(
                die('No User found for id ' . $id . PHP_EOL)
            );
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}
