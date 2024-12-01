<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'role' => 'Admin', // Username
        ]);

        Role::create([
            'role_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'role' => 'EO', // Username
        ]);

        Role::create([
            'role_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'role' => 'User', // Username
        ]);
    }
}
