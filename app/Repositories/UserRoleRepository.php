<?php

namespace App\Repositories;

use App\Models\UserRole;
use App\Repositories\Interfaces\UserRoleRepositoryInterface;
use Exception;

class UserRoleRepository implements UserRoleRepositoryInterface {
    public function findAll() {
        return UserRole::all();
    }

    public function create(array $data) {
        return UserRole::create($data);
    }

    public function update(string|int $id, array $data) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->update($data);
        return $user;
    }

    public function delete(string|int $id) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->delete();
    }

    public function getOne(string|int $id) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }
}
