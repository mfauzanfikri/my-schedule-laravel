<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface {
    public function findAll(?array $options);

    public function create(array $data);

    public function createByRole(array $data, string $roleId);

    public function update(string|int $id, array $data);

    public function delete(string|int $id);

    public function getOne(string|int $id);

    public function getByUsername(string $username);

    public function getByEmail(string $email);
}
