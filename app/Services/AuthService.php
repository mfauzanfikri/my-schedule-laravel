<?php

namespace App\Services;

use Laravel\Sanctum\Sanctum;

class AuthService
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function login(string $email, string $password)
    {
    }
}
