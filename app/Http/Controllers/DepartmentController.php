<?php

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class DepartmentController extends Controller {
    public function __construct(private DepartmentService $departmentService) {
    }

    public function index(): View {
        $departments = $this->departmentService->findAll();

        $data = [
            'title' => 'Departments',
            'departments' => $departments
        ];

        return view('department', $data);
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required'
        ]);

        $name = Str::trim(Str::lower($request->post('name')));

        if (empty($name)) {
            return redirect()->back()->with('error', 'Name field cannot be empty.');
        }

        $slug = Str::slug($name);

        if ($this->departmentService->findBySlug($slug)) {
            return redirect()->back()->with('error', 'Department already exists.');
        }

        $createData = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->departmentService->create($createData);

        return redirect()->back()->with('success', 'Department created.');
    }

    public function update(Request $request): RedirectResponse {
        $request->validate([
            'id' => 'required|numeric',
            'name' => 'nullable|unique:departments,name'
        ]);

        if (!$request->post('name')) {
            return redirect()->back()->with('warning', 'There is nothing to update.');
        }

        $id = $request->post('id');
        $name = Str::trim(Str::lower($request->post('name')));

        if (empty($name)) {
            return redirect()->back()->with('error', 'Name field cannot be empty.');
        }

        $slug = Str::slug($name);

        $updateData = [
            'name' => $name,
            'slug' => $slug
        ];

        $this->departmentService->update($id, $updateData);

        return redirect()->back()->with('success', 'Department updated.');
    }

    public function delete(Request $request): RedirectResponse {
        $request->validate([
            'id' => 'required|numeric'
        ]);

        $id = $request->post('id');

        $this->departmentService->delete($id);

        return redirect()->back()->with('success', 'Department deleted.');
    }
}
