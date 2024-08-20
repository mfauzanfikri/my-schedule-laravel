<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use Exception;

class DepartmentRepository implements DepartmentRepositoryInterface {
    public function findAll() {
        return Department::all();
    }

    public function create(array $data) {
        return Department::create($data);
    }

    public function update(string|int $id, array $data) {
        $department = Department::find($id);

        if (!$department) {
            throw new Exception('department not found');
        }

        $department->update($data);
        return $department;
    }

    public function delete(string|int $id) {
        $department = Department::find($id);

        if (!$department) {
            throw new Exception('department not found');
        }

        $department->delete();
    }

    public function getOne(string|int $id) {
        $department = Department::find($id);

        if (!$department) {
            throw new Exception('department not found');
        }

        return $department;
    }
}
