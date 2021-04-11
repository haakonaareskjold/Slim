<?php

namespace App\Https\Controllers;

use App\Helpers;
use App\Models\UserRepositoryInterface;
use App\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class UserController
{



    public function __construct(private UserRepositoryInterface $user){}

    public function index(Response $response)
    {
        $users = $this->user->getAllUsers();

        return View::render($response, 'users/index.twig', compact('users'));
    }

    public function create(Response $response): Response
    {
        return View::render($response, 'users/create.twig');
    }

    public function store(Request $request, Response $response): Response
    {

        $name = $request->getParsedBody();

        $this->user->createUser(implode($name));

        return $response->withStatus(200)->withHeader('Location', '/');
    }

    public function show(Response $response, $id): Response
    {
        $query = $this->user->getUserById($id);

        return View::render($response, 'users/show.twig', compact('query'));
    }

    public function edit(Response $response, $id): Response
    {
        $query = $this->user->getUserById($id);

        return View::render($response, 'users/edit.twig', compact('query'));
    }

    public function update(Request $request, $id, Response $response): Response
    {
        $name = $request->getParsedBody();

        $this->user->update($id, $name['name']);

        return $response->withStatus(200)->withHeader('Location', '/');
    }

    public function destroy($id, Response $response): Response
    {
        $this->user->delete($id, $response);

        return $response->withHeader('Location', '/');
    }

}
