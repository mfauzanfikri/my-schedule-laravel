<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Traits\HasOrderByOptions;

class UserRepository implements UserRepositoryInterface {
    use HasOrderByOptions;

    public function all(?array $options) {
        if (!$options) {
            return User::all();
        }

        $users = User::query()->with('userRole');

        if (isset($options['order_by'])) {
            if ($options['order_by'] === static::ORDER_BY_LATEST) {
                $users->latest();
            } else if ($options['order_by'] === static::ORDER_BY_OLDEST) {
                $users->oldest();
            }
        }

        return $users->get();
    }

    public function create(array $data) {
        return User::create($data);
    }

    public function update(array $data, $id) {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function find($id) {
        return User::findOrFail($id);
    }

    public function findByUsername(string $username) {
        return User::where('username', $username)->findOrFail($username);
    }

    public function findByEmail($email) {
        return User::where('email', $email)->findOrFail($email);
    }
}
