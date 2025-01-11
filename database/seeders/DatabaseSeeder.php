<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePosition;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Roles;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $roles = Roles::list();

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'slug' => Str::slug($role)
            ]);
        }

        $admin = Role::where('slug', Str::slug(Roles::ADMIN))->first();
        $user = Role::where('slug', Str::slug(Roles::USER))->first();

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
