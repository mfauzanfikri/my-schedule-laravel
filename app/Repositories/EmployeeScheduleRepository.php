<?php

namespace App\Repositories;

use App\Models\EmployeeSchedule;
use App\Repositories\Interfaces\EmployeeScheduleRepositoryInterface;
use Exception;

class EmployeeScheduleRepository implements EmployeeScheduleRepositoryInterface
{
    public function findAll(?array $options)
    {
        // TODO: implement $options parameter
        $employeeSchedules = EmployeeSchedule::latest();

        return $employeeSchedules->get();
    }

    public function create(array $data, string|int $userId)
    {
        // TODO: create employee schedule based on user
        return EmployeeSchedule::create($data);
    }

    public function update(string|int $id, array $data)
    {
        $employee = EmployeeSchedule::find($id);

        if (!$employee) {
            throw new Exception('employee schedule not found');
        }

        $employee->update($data);

        return $employee;
    }

    public function delete(string|int $id)
    {
        $employee = EmployeeSchedule::find($id);

        if (!$employee) {
            throw new Exception('employee schedule not found');
        }

        $employee->delete();
    }

    public function getOne(string|int $id)
    {
        $employee = EmployeeSchedule::find($id);

        if (!$employee) {
            throw new Exception('employee schedule not found');
        }

        return $employee;
    }

    public function getByUserId(string|int $userId)
    {
        // TODO: implementation
    }

    public function getByCardId(string $cardId)
    {
        // TODO: implementation
    }
}
