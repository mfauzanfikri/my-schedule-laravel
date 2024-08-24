<?php

namespace App\Http\Controllers;

use App\Services\EmployeePositionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class EmployeePositionController extends Controller {
    public function __construct(private EmployeePositionService $employeePositionService) {
    }

    public function index(): View {
        $employeePositions = $this->employeePositionService->findAll();

        $data = [
            'title' => 'Employee Positions',
            'employeePositions' => $employeePositions
        ];

        return view('employee-position', $data);
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required'
        ]);

        $name = Str::trim($request->post('name'));

        if (empty($name)) {
            return redirect()->back()->with('error', 'Name field should not be empty.');
        }

        $slug = Str::slug($name);

        if ($this->employeePositionService->findBySlug($slug)) {
            return redirect()->back()->with('error', 'Employee position already exists.');
        }

        $createData = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->employeePositionService->create($createData);

        return redirect()->back()->with('success', 'Employee position created.');
    }

    public function update(Request $request): RedirectResponse {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'nullable|unique:employeePositions,name'
        ]);

        if (!$request->post('name')) {
            return redirect()->back()->with('warning', 'There is nothing to update.');
        }

        $id = $request->post('id');
        $name = Str::trim($request->post('name'));

        if (empty($name)) {
            return redirect()->back()->with('error', 'Name field should not be empty.');
        }

        $slug = Str::slug($name);

        $updateData = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->employeePositionService->update($id, $updateData);

        return redirect()->back()->with('success', 'Employee position updated.');
    }

    public function delete(Request $request): RedirectResponse {
        $request->validate([
            'id' => 'required|numeric'
        ]);

        $id = $request->post('id');

        $this->employeePositionService->delete($id);

        return redirect()->back()->with('success', 'Employee position deleted.');
    }
}
