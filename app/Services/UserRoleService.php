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

    public function update(array $data, $id) {
        return $this->userRoleRepository->update($data, $id);
    }

    public function delete($id) {
        return $this->userRoleRepository->delete($id);
    }

    public function all() {
        return $this->userRoleRepository->all();
    }

    public function find($id) {
        return $this->userRoleRepository->find($id);
    }
}
