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

    public function update(array $data, $id) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->delete();
    }

    public function getOne($id) {
        $user = UserRole::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }
}
