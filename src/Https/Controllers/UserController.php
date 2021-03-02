<?php

namespace App\Https\Controllers;

use App\Helpers;
use App\Models\UserRepositoryInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class UserController
{

    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $user;

    public function __construct(
        UserRepositoryInterface $user
    ) {
        $this->user = $user;
    }

    public function index(Response $response): Response
    {
        $users = $this->user->getAllUsers();

        return Helpers::view($response, 'users/index.twig', compact('users'));
    }

    public function create(Response $response): Response
    {
        return Helpers::view($response, 'users/create.twig');
    }

    public function store(Request $request, Response $response): Response
    {

        $name = $request->getParsedBody();

        $this->user->createUser(implode($name));

        return $response->withStatus(200)->withHeader('Location', '/users');
    }

    public function show(Response $response, $id): Response
    {
        $query = $this->user->getUserById($id);

        return Helpers::view($response, 'users/show.twig', compact('query'));
    }

    public function edit(Response $response, $id): Response
    {
        $query = $this->user->getUserById($id);

        return Helpers::view($response, 'users/edit.twig', compact('query'));
    }

    public function update(Request $request, $id, Response $response): Response
    {
        $name = $request->getParsedBody();

        $this->user->update($id, $name['name']);

        return $response->withStatus(200)->withHeader('Location', '/users');
    }

    public function destroy($id, Response $response): Response
    {
        $this->user->delete($id);

        return $response->withStatus(200)->withHeader('Location', '/users');
    }
}
