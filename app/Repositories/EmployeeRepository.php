<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\EmployeeRole;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Traits\HasOrderByOptions;
use Exception;

class EmployeeRepository implements EmployeeRepositoryInterface {
    use HasOrderByOptions;

    public function findAll(?array $options) {
        if (!$options) {
            return Employee::with(['user', 'department', 'employeePosition'])->get();
        }

        $employees = Employee::with(['user', 'department', 'employeePosition']);

        if (isset($options['order_by'])) {
            if ($options['order_by'] === static::ORDER_BY_LATEST) {
                $employees->latest();
            } else if ($options['order_by'] === static::ORDER_BY_OLDEST) {
                $employees->oldest();
            }
        }

        return $employees->get();
    }

    public function create(array $data, string|int $userId, string|int $departmentId, string|int $employeePositionId) {
        // TODO: create employee based on user, department, and employeePosition
        return Employee::create($data);
    }

    public function update(string|int $id, array $data) {
        $employee = Employee::find($id);

        if (!$employee) {
            throw new Exception('employee not found');
        }

        $employee->update($data);

        return $employee;
    }

    public function delete(string|int $id) {
        $employee = Employee::find($id);

        if (!$employee) {
            throw new Exception('employee not found');
        }

        $employee->delete();
    }

    public function getOne(string|int $id) {
        $employee = Employee::with(['user', 'department', 'employeePosition'])->find($id);

        if (!$employee) {
            throw new Exception('employee not found');
        }

        return $employee;
    }

    public function getByUser(string|int $userId) {
        // TODO: implementation
    }

    public function getByCardId(string $cardId) {
        // TODO: implementation
    }
}
