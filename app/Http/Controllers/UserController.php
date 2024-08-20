<?php

namespace App\Http\Controllers;

use App\Services\UserRoleService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Throwable;

class UserController extends Controller {
    public function __construct(protected UserService $userService, protected UserRoleService $userRoleService) {
    }

    public function index(): View {
        $users = $this->userService->findAll([
            'order_by' => $this->userService::ORDER_BY_LATEST
        ]);

        $data = [
            'title' => 'Users',
            'users' => $users,
        ];

        return view('user', $data);
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'username' => 'required|unique:users,username|max:20',
            'email' => 'required|email|unique:users,email|max:50',
            'password' => 'required|max:10',
        ]);

        $userRole = $this->userRoleService->getOne(2);

        $this->userService->createByUserRole([
            'username' => $request->post('username'),
            'email' => $request->post('email'),
            'password' => $request->post('password')
        ], $userRole->id);

        return redirect()->back()->with('success', 'User created.');
    }

    public function update(Request $request): RedirectResponse {
        $validated = $request->validate([
            'id' => 'required',
            'username' => 'nullable|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'nullable'
        ]);

        $id = $validated['id'];

        $updateData = Arr::except(Arr::whereNotNull($validated), 'id');

        if (empty($updateData)) {
            return redirect()->back()->with('warning', 'Nothing to update, please fill atleast one field to update.');
        }

        try {
            $this->userService->update($updateData, $id);
        } catch (Throwable $e) {
            abort(404);
        }

        return redirect()->back()->with('success', 'User updated.');
    }

    public function destroy(Request $request) {
        $validated = $request->validate([
            'id' => 'required'
        ]);

        $id = $validated['id'];

        try {
            $this->userService->delete($id);
        } catch (Throwable $e) {
            abort(404);
        }

        return redirect()->back()->with('success', 'User deleted.');
    }
}
