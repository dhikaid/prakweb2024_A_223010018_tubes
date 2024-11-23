<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Untuk UUID
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'username' => 'dummyuser', // Username
            'email' => 'regaccount@bhadrikais.my.id', // Email
            'fullname' => 'Dummy User', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'default.png', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 1, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
        ]);
    }
}
