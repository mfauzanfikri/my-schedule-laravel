<?php

namespace App\Repositories\Interfaces;

interface EmployeeRepositoryInterface {
    public function findAll(?array $options);

    public function create(array $data, string|int $userId, string|int $departmentId, string|int $employeePositionId);

    public function update(string|int $id, array $data);

    public function delete(string|int $id);

    public function getOne(string|int $id);

    public function getByUser(string|int $userId);

    public function getByCardId(string $cardId);
}
