<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface {
    public function findAll(?array $options);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function getOne($id);

    public function getByUsername(string $username);

    public function getByEmail(string $email);
}
