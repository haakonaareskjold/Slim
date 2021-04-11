<?php

namespace App\Models;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class UserRepository
 * @package App\Models
 */
class UserRepository implements UserRepositoryInterface
{


    public function __construct(
        private EntityManagerInterface $entityManager,
        private User $user,
    ) {}

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

    /**
     * @param $id
     * @param Response $response
     * @return Response
     * @throws Exception
     */
    public function delete($id, Response $response): Response
    {
        $user = $this->entityManager->find(User::class, $id);

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        if (!$user) {
            throw new Exception(
                die('No User found for id ' . $id . PHP_EOL)
            );
        }

        return $response->withStatus(204);
    }
}
