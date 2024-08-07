<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller {
    public function index(): View {
        $data = [
            'title' => 'Home'
        ];

        return view('home', $data);
    }
}
