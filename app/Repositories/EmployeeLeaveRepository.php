<?php

namespace App\Repositories;

use App\Models\EmployeeLeave;
use App\Repositories\Interfaces\EmployeeLeaveRepositoryInterface;
use Exception;

class EmployeeLeaveRepository implements EmployeeLeaveRepositoryInterface
{
    public function findAll(?array $options)
    {
        // TODO: implement $options parameter
        $employeeLeaves = EmployeeLeave::latest();

        return $employeeLeaves->get();
    }

    public function create(array $data, string|int $userId)
    {
        // TODO: create employee leave based on user
        return EmployeeLeave::create($data);
    }

    public function update(string|int $id, array $data)
    {
        $employee = EmployeeLeave::find($id);

        if (!$employee) {
            throw new Exception('employee leave not found');
        }

        $employee->update($data);

        return $employee;
    }

    public function delete(string|int $id)
    {
        $employee = EmployeeLeave::find($id);

        if (!$employee) {
            throw new Exception('employee leave not found');
        }

        $employee->delete();
    }

    public function getOne(string|int $id)
    {
        $employee = EmployeeLeave::find($id);

        if (!$employee) {
            throw new Exception('employee leave not found');
        }

        return $employee;
    }

    public function getByUser(string|int $userId)
    {
        // TODO: implementation
    }

    public function getByCardId(string $cardId)
    {
        // TODO: implementation
    }
}
