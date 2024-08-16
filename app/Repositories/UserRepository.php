<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Traits\HasOrderByOptions;
use Exception;

class UserRepository implements UserRepositoryInterface {
    use HasOrderByOptions;

    public function findAll(?array $options) {
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
        $user = User::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->update($data);

        return $user;
    }

    public function delete($id) {
        $user = User::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        $user->delete();
    }

    public function getOne($id) {
        $user = User::find($id);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }

    public function getByUsername(string $username) {
        $user = User::where('username', $username)->find($username);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }

    public function getByEmail($email) {
        $user =  User::where('email', $email)->find($email);

        if (!$user) {
            throw new Exception('user not found');
        }

        return $user;
    }
}
