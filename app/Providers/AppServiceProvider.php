<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeePositionRepository;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\EmployeePositionRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\UserRoleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRoleRepository;
use App\Services\DepartmentService;
use App\Services\EmployeePositionService;
use App\Services\UserRoleService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(UserRoleRepositoryInterface::class, UserRoleRepository::class);
        $this->app->bind(UserRoleService::class, function ($app) {
            return new UserRoleService($app->make(UserRoleRepositoryInterface::class));
        });

        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(DepartmentService::class, function ($app) {
            return new DepartmentService($app->make(DepartmentRepositoryInterface::class));
        });

        $this->app->bind(EmployeePositionRepositoryInterface::class, EmployeePositionRepository::class);
        $this->app->bind(EmployeePositionService::class, function ($app) {
            return new EmployeePositionService($app->make(EmployeePositionRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}
