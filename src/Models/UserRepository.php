<?php

namespace App\Models;

trait UserRepository
{
    public function findAll(User $user)
    {
            return sprintf("-%s\n", $user->getName());
    }
}