<?php

namespace App\Http\Controllers;

use App\Services\UserRoleService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
