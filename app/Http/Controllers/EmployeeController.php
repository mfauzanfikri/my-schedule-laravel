<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller {

    public function index(): View {

        $data = [
            'title' => 'Employees'
        ];

        return view('employee', $data);
    }
}
