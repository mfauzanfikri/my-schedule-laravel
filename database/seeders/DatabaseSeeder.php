<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\User;
use App\Models\UserRole;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UserRoles;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $userRoles = UserRoles::list();

        foreach ($userRoles as $role) {
            UserRole::create([
                'name' => $role,
                'slug' => Str::slug($role)
            ]);
        }

        $admin = UserRole::where('slug', Str::slug(UserRoles::ADMIN))->first();
        $user = UserRole::where('slug', Str::slug(UserRoles::USER))->first();

        User::factory()->for($admin)->create();
        User::factory(5)->for($user)->create();


        $employeePositions = ['Staff', 'Manager', 'Officer'];

        foreach ($employeePositions as $employeePosition) {
            EmployeePosition::create([
                'name' => $employeePosition,
                'slug' => Str::slug($employeePosition)
            ]);
        }

        $departments = ['Human Resource', 'Public Relation', 'Sales', 'Marketing', 'Information Technology'];

        foreach ($departments as $department) {
            Department::create([
                'name' => $department,
                'slug' => Str::slug($department)
            ]);
        }


        $users = User::all();

        foreach ($users as $user) {
            Employee::factory()
                ->for($user)
                ->for(Department::all()->random())
                ->for(EmployeePosition::all()->random())
                ->create();
        }
    }
}
