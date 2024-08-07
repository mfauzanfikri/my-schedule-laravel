<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller {
    public function index(): View {
        $data = [
            'title' => 'User'
        ];

        return view('user', $data);
    }
}
