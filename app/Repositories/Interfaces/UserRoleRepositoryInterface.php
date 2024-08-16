<?php

namespace App\Repositories\Interfaces;

interface UserRoleRepositoryInterface {
    public function create(array $data);

    public function update(string|int $id, array $data);

    public function delete(string|int $id);

    public function findAll();

    public function getOne(string|int $id);
}
