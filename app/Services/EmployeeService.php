<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeService {
    public function __construct(
        protected EmployeeRepositoryInterface $employeeRepository
    ) {
    }

    public function create(array $data, string $userId, string $departmentId, string $employeeId): bool {
        return $this->employeeRepository->create($data, $userId, $departmentId, $employeeId);
    }

    public function update(string|int $id, array $data) {
        return $this->employeeRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->employeeRepository->delete($id);
    }

    public function findAll() {
        return $this->employeeRepository->findAll();
    }

    public function getOne(string|int $id) {
        return $this->employeeRepository->getOne($id);
    }

    public function getByUserId(string $userId) {
        return $this->employeeRepository->getByUserId($userId);
    }

    public function getByCardId(string $cardId) {
        return $this->employeeRepository->getByCardId($cardId);
    }
}
