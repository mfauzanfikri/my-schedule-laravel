<?php

namespace App\Repositories;

use App\Models\EmployeePosition;
use App\Repositories\Interfaces\EmployeePositionRepositoryInterface;
use Exception;

class EmployeePositionRepository implements EmployeePositionRepositoryInterface {
    public function findAll() {
        return EmployeePosition::all();
    }

    public function create(array $data) {
        return EmployeePosition::create($data);
    }

    public function update(string|int $id, array $data) {
        $employeePosition = EmployeePosition::find($id);

        if (!$employeePosition) {
            throw new Exception('employeePosition not found');
        }

        $employeePosition->update($data);
        return $employeePosition;
    }

    public function delete(string|int $id) {
        $employeePosition = EmployeePosition::find($id);

        if (!$employeePosition) {
            throw new Exception('employeePosition not found');
        }

        $employeePosition->delete();
    }

    public function getOne(string|int $id) {
        $employeePosition = EmployeePosition::find($id);

        if (!$employeePosition) {
            throw new Exception('employeePosition not found');
        }

        return $employeePosition;
    }
}
