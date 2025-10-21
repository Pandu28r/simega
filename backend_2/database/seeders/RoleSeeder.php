<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role
        $superAdminRole = Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $employeeRole = Role::create(['name' => 'employee', 'guard_name' => 'web']);

        // Buat user admin
        $superAdmin = User::create([
            'name' => 'super admin',
            'email' => 'sadmin@example.com',
            'password' => Hash::make('sadmin123'),
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);

        $employee = User::create([
            'name' => 'Myrza Pandu Pamungkas',
            'email' => 'myrzapandu03@gmail.com',
            'password' => Hash::make('myrza123'),
        ]);

        $superAdmin->assignRole($superAdminRole);
        $admin->assignRole($adminRole);
        $employee->assignRole($employeeRole);
    }
}
