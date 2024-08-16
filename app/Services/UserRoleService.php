<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRoleRepositoryInterface;

class UserRoleService {
    public function __construct(
        protected UserRoleRepositoryInterface $userRoleRepository
    ) {
    }

    public function create(array $data) {
        return $this->userRoleRepository->create($data);
    }

    public function update(string|int $id, array $data) {
        return $this->userRoleRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->userRoleRepository->delete($id);
    }

    public function findAll() {
        return $this->userRoleRepository->findAll();
    }

    public function getOne(string|int $id) {
        return $this->userRoleRepository->getOne($id);
    }
}
