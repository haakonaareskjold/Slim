<?php

namespace App\Https\Controllers;


use App\Models\UserRepository;
use App\Models\UserRepositoryInterface;
use Psr\Http\Message\ResponseInterface as Response;


class UserController
{

    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $user;

    public function __construct
    (
        UserRepositoryInterface $user
    )
    {
        $this->user = $user;
    }

    public function show(Response $response, $id): Response
    {
        $query = $this->user->getUserById($id);

        return view($response, 'users.show', compact('query'));
    }

    public function index(Response $response): Response
    {
        $query = $this->user->getAllUsers();

        return view($response, 'users.index', compact('query'));
    }
}