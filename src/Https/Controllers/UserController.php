<?php

namespace App\Https\Controllers;

use App\Models\User;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface as Response;


class UserController
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;
    /**
     * @var User
     */
    private User $user;

    public function __construct
    (
        EntityManagerInterface $entityManager,
        User $user
    )
    {
        $this->entityManager = $entityManager;
        $this->user = $user;
    }

    public function show(Response $response, $id)
    {
        $query = $this->entityManager->find('App\Models\User', $id);

        return view($response, 'users.show', compact('query'));
    }

    public function index(Response $response)
    {
        $query = $this->entityManager->getRepository('App\Models\User')->findAll();

        return view($response, 'users.index', compact('query'));
    }
}