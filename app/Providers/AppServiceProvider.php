<?php

namespace App\Providers;

use App\Repositories\DepartmentRepository;
use App\Repositories\EmployeeLeaveRepository;
use App\Repositories\EmployeePositionRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\EmployeeScheduleRepository;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Interfaces\EmployeeLeaveRepositoryInterface;
use App\Repositories\Interfaces\EmployeePositionRepositoryInterface;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\EmployeeScheduleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Services\DepartmentService;
use App\Services\EmployeeLeaveService;
use App\Services\EmployeePositionService;
use App\Services\EmployeeScheduleService;
use App\Services\EmployeeService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(RoleService::class, function ($app) {
            return new RoleService($app->make(RoleRepositoryInterface::class));
        });

        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(DepartmentService::class, function ($app) {
            return new DepartmentService($app->make(DepartmentRepositoryInterface::class));
        });

        $this->app->bind(EmployeePositionRepositoryInterface::class, EmployeePositionRepository::class);
        $this->app->bind(EmployeePositionService::class, function ($app) {
            return new EmployeePositionService($app->make(EmployeePositionRepositoryInterface::class));
        });

        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(EmployeeService::class, function ($app) {
            return new EmployeeService($app->make(EmployeeRepositoryInterface::class));
        });

        $this->app->bind(EmployeeScheduleRepositoryInterface::class, EmployeeScheduleRepository::class);
        $this->app->bind(EmployeeScheduleService::class, function ($app) {
            return new EmployeeScheduleService($app->make(EmployeeScheduleRepositoryInterface::class));
        });

        $this->app->bind(EmployeeLeaveRepositoryInterface::class, EmployeeLeaveRepository::class);
        $this->app->bind(EmployeeLeaveService::class, function ($app) {
            return new EmployeeLeaveService($app->make(EmployeeLeaveRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
