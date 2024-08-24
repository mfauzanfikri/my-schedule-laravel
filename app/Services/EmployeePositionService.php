<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeePositionRepositoryInterface;

class EmployeePositionService {
    public function __construct(
        protected EmployeePositionRepositoryInterface $employeePositionRepository
    ) {
    }

    public function create(array $data) {
        return $this->employeePositionRepository->create($data);
    }

    public function update(string|int $id, array $data) {
        return $this->employeePositionRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->employeePositionRepository->delete($id);
    }

    public function findAll() {
        return $this->employeePositionRepository->findAll();
    }

    public function getOne(string|int $id) {
        return $this->employeePositionRepository->getOne($id);
    }

    public function findBySlug(string $slug) {
        return $this->employeePositionRepository->findBySlug($slug);
    }
}
