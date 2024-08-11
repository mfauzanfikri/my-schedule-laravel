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

    public function update(array $data, $id) {
        return $this->userRepository->update($data, $id);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }

    public function all(?array $options) {
        return $this->userRepository->all($options);
    }

    public function find($id) {
        return $this->userRepository->find($id);
    }
}
