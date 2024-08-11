<?php

namespace App\Repositories;

use App\Models\UserRole;
use App\Repositories\Interfaces\UserRoleRepositoryInterface;

class UserRoleRepository implements UserRoleRepositoryInterface {
    public function all() {
        return UserRole::all();
    }

    public function create(array $data) {
        return UserRole::create($data);
    }

    public function update(array $data, $id) {
        $user = UserRole::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = UserRole::findOrFail($id);
        $user->delete();
    }

    public function find($id) {
        return UserRole::findOrFail($id);
    }
}
