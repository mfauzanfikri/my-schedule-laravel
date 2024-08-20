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
        $userRole = UserRole::find($id);

        if (!$userRole) {
            throw new Exception('userRole not found');
        }

        $userRole->update($data);
        return $userRole;
    }

    public function delete(string|int $id) {
        $userRole = UserRole::find($id);

        if (!$userRole) {
            throw new Exception('userRole not found');
        }

        $userRole->delete();
    }

    public function getOne(string|int $id) {
        $userRole = UserRole::find($id);

        if (!$userRole) {
            throw new Exception('userRole not found');
        }

        return $userRole;
    }
}
