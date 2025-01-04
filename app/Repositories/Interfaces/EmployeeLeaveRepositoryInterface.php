<?php

namespace App\Repositories\Interfaces;

interface EmployeeLeaveRepositoryInterface
{
    public function findAll(?array $options);

    public function create(array $data, string|int $userId);

    public function update(string|int $id, array $data);

    public function delete(string|int $id);

    public function getOne(string|int $id);

    public function getByUserId(string|int $userId);

    public function getByCardId(string $cardId);
}
