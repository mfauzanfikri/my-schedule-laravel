<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeScheduleRepositoryInterface;

class EmployeeScheduleService {
    public function __construct(
        protected EmployeeScheduleRepositoryInterface $employeeScheduleRepository
    ) {
    }

    public function create(array $data, string $userId): bool {
        return $this->employeeScheduleRepository->create($data, $userId);
    }

    public function update(string|int $id, array $data) {
        return $this->employeeScheduleRepository->update($id, $data);
    }

    public function delete(string|int $id) {
        return $this->employeeScheduleRepository->delete($id);
    }

    public function findAll(?array $options) {
        return $this->employeeScheduleRepository->findAll($options);
    }

    public function getOne(string|int $id) {
        return $this->employeeScheduleRepository->getOne($id);
    }

    public function getByUserId(string $userId) {
        return $this->employeeScheduleRepository->getByUserId($userId);
    }

    public function getByCardId(string $cardId) {
        return $this->employeeScheduleRepository->getByCardId($cardId);
    }
}
