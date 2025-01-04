<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeLeaveRepositoryInterface;

class EmployeeLeaveService {
    public function __construct(
        protected EmployeeLeaveRepositoryInterface $employeeLeaveRepository
    ) {
    }

    public function create(array $data, string $userId): bool {
        return $this->employeeLeaveRepository->create($data, $userId);
    }

    public function update(string|int $id, array $data) {
        return $this->employeeLeaveRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->employeeLeaveRepository->delete($id);
    }

    public function findAll(?array $options) {
        return $this->employeeLeaveRepository->findAll($options);
    }

    public function getOne(string|int $id) {
        return $this->employeeLeaveRepository->getOne($id);
    }

    public function getByUserId(string $userId) {
        return $this->employeeLeaveRepository->getByUserId($userId);
    }

    public function getByCardId(string $cardId) {
        return $this->employeeLeaveRepository->getByCardId($cardId);
    }
}
