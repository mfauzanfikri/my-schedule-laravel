<?php

namespace App\Http\Controllers;

use App\Services\UserRoleService;
use App\Services\UserService;
use Illuminate\View\View;

class UserController extends Controller {
    public function __construct(protected UserService $userService, protected UserRoleService $userRoleService) {
    }

    public function index(): View {
        $users = $this->userService->all([
            'order_by' => $this->userService::ORDER_BY_LATEST
        ]);

        $userRoles = $this->userRoleService->all();

        $data = [
            'title' => 'User',
            'users' => $users,
            'userRoles' => $userRoles
        ];

        return view('user', $data);
    }
}
