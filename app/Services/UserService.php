<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Traits\HasOrderByOptions;

class UserService {
    use HasOrderByOptions;

    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {
    }

    public function create(array $data) {
        return $this->userRepository->create($data);
    }

    public function createByUserRole(array $data, string|int $userRoleId) {
        return $this->userRepository->createByUserRole($data, $userRoleId);
    }

    public function update(array $data, $id) {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }

    public function findAll(?array $options) {
        return $this->userRepository->findAll($options);
    }

    public function getOne($id) {
        return $this->userRepository->getOne($id);
    }

    public function getByUsername(string $username) {
        return $this->userRepository->getByUsername($username);
    }

    public function getByEmail(string $email) {
        return $this->userRepository->getByEmail($email);
    }
}
