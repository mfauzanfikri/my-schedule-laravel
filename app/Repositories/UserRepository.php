<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserRole;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    public function findAll(?array $options)
    {
        // TODO: implement $options parameter
        $users = User::with('userRole')->latest();

        return $users->get();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function createByUserRole(array $data, string $userRoleId)
    {
        $userRole = UserRole::find($userRoleId);

        if (!$userRole) {
            throw new Exception('userRole not found');
        }

        return $userRole->users()->create($data);
    }

    public function update(string|int $id, array $data)
    {
        $user = User::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->update($data);

        return $user;
    }

    public function delete(string|int $id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->delete();
    }

    public function getOne(string|int $id)
    {
        $user = User::with('userRole')->find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }

    public function getByUsername(string $username)
    {
        $user = User::with('userRole')->where('username', $username)->first();

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }

    public function getByEmail(string $email)
    {
        $user = User::with('userRole')->where('email', $email)->first();

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }
}
