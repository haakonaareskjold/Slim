<?php

namespace App\Https\Controllers;

use App\Models\UserRepository;

class UserController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function delete($request, $response)
    {
        $this->userRepository->remove($request->getAttribute('id'));

        $response->getBody()->write('User deleted');
        return $response;
    }
}