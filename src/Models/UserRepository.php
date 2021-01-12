<?php


namespace App\Models;


use Doctrine\ORM\EntityManagerInterface;

/**
 * Class UserRepository
 * @package App\Models
 */
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

    /**
     * @return object|array
     */
    public function getAllUsers(): object|array
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
    public function getUserById($id): object|array
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
        $user = new User();
        $user->setName($name['name']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
}