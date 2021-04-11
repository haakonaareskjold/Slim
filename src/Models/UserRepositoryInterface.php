<?php

namespace App\Models;

use Psr\Http\Message\ResponseInterface as Response;

interface UserRepositoryInterface
{
    public function getAllUsers();

    public function getUserById($id);

    public function createUser($name);

    public function update(string $id, string $name);

    public function delete($id, Response $response);
}
