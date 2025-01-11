<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use Exception;

class RoleRepository implements RoleRepositoryInterface {
    public function findAll() {
        return Role::latest()->get();
    }

    public function create(array $data) {
        return Role::create($data);
    }

    public function update(string|int $id, array $data) {
        $role = Role::find($id);

        if (!$role) {
            throw new Exception('role not found');
        }

        $role->update($data);
        return $role;
    }

    public function delete(string|int $id) {
        $role = Role::find($id);

        if (!$role) {
            throw new Exception('role not found');
        }

        $role->delete();
    }

    public function getOne(string|int $id) {
        $role = Role::find($id);

        if (!$role) {
            throw new Exception('role not found');
        }

        return $role;
    }
}
