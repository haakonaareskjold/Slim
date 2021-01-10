<?php

namespace App\Https\Controllers;

use App\Models\User;
use App\Models\UserRepository;
use App\Models\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface as Response;


class UserController
{

    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $user;

    public function __construct
    (
        UserRepository $user
    )
    {
        $this->user = $user;
    }

    public function show(Response $response, $id)
    {
        $query = $this->user->getUserById($id);

        return view($response, 'users.show', compact('query'));
    }

    public function index(Response $response)
    {

        return view($response, 'users.index', compact('query'));
    }
}