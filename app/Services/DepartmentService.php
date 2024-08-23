<?php

namespace App\Services;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentService {
    public function __construct(
        protected DepartmentRepositoryInterface $departmentRepository
    ) {
    }

    public function create(array $data) {
        return $this->departmentRepository->create($data);
    }

    public function update(string|int $id, array $data) {
        return $this->departmentRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->departmentRepository->delete($id);
    }

    public function findAll() {
        return $this->departmentRepository->findAll();
    }

    public function getOne(string|int $id) {
        return $this->departmentRepository->getOne($id);
    }

    public function findBySlug(string $slug) {
        return $this->departmentRepository->findBySlug($slug);
    }
}
