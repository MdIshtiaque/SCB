<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin role
        Role::create([
            'name' => 'Admin'
        ]);

        // Create User role
        Role::create([
            'name' => 'User'
        ]);
    }
}
