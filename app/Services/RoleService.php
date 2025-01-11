<?php

namespace App\Services;

use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleService {
    public function __construct(
        protected RoleRepositoryInterface $roleRepository
    ) {
    }

    public function create(array $data) {
        return $this->roleRepository->create($data);
    }

    public function update(string|int $id, array $data) {
        return $this->roleRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->roleRepository->delete($id);
    }

    public function findAll() {
        return $this->roleRepository->findAll();
    }

    public function getOne(string|int $id) {
        return $this->roleRepository->getOne($id);
    }
}
