<?php

namespace App\Repositories\Interfaces;

interface UserRoleRepositoryInterface {
    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function findAll();

    public function getOne($id);
}
