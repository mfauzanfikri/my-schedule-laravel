<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::post('/update', [UserController::class, 'update']);
    Route::post('/delete', [UserController::class, 'delete']);
});

Route::prefix('/employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
});

Route::prefix('/departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/store', [DepartmentController::class, 'store']);
    Route::post('/update', [DepartmentController::class, 'update']);
    Route::post('/delete', [DepartmentController::class, 'delete']);
});
