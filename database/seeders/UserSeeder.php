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
            'email' => 'Dummy@gmail.com', // Email
            'fullname' => 'Dummy User', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 1, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);

        User::create([
            'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'username' => 'DhikaId', // Username
            'email' => 'bhadrika@gmail.com', // Email
            'fullname' => 'Bhadrika', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 1, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);

        User::create([
            'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'username' => 'AzharLuth', // Username
            'email' => 'azhar@gmail.com', // Email
            'fullname' => 'Azhar Luthfiadi', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 2, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => false, //
        ]);

        User::create([
            'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'username' => 'AliRod', // Username
            'email' => 'ali@gmail.com', // Email
            'fullname' => 'Ali Rogja', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 2, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => false, //
        ]);

        User::create([
            'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
            'username' => 'AurelPutri', // Username
            'email' => 'aurel@gmail.com', // Email
            'fullname' => 'Aurelia Melati', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_id' => 2, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);
    }
}
