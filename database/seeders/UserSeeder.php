<?php

namespace Database\Seeders;

use App\Models\Role;
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
        // User::create([
        //     'user_uuid' => Str::uuid(), // UUID untuk kolom user_uuid
        //     'username' => 'dummyuser', // Username
        //     'email' => 'Dummy@gmail.com', // Email
        //     'fullname' => 'Dummy User', // Nama lengkap (gunakan fullname, bukan name)
        //     'image' => 'https://i2.wp.com/cdn.auth0.com/avatars/bh.png?ssl=1', // Gambar profil default
        //     'password' => Hash::make('123'), // Hash untuk password
        //     'role_uuid' => Role::inRandomOrder()->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
        //     'isVerified' => true, //
        // ]);

        User::create([
            'username' => 'bookrn', // Username
            'email' => 'bookrn@mail.bhadrikais.my.id', // Email
            'fullname' => 'bookrn', // Nama lengkap (gunakan fullname, bukan name)
            'image' => asset('assets/' . env('PATH_LOGO', 'newlogo.png')), // Gambar profil default
            'password' => Hash::make('Bitwave2024'), // Hash untuk password
            'role_uuid' => Role::where('role', 'Admin')->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);

        User::create([
            'username' => 'dhikaid', // Username
            'email' => 'bhadrika@gmail.com', // Email
            'fullname' => 'Bhadrika', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://ui-avatars.com/api/?name=dhikaid&background=random', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_uuid' => Role::inRandomOrder()->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);

        User::create([

            'username' => 'azharluth', // Username
            'email' => 'azhar@gmail.com', // Email
            'fullname' => 'Azhar Luthfiadi', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://ui-avatars.com/api/?name=azharluth&background=random', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_uuid' => Role::inRandomOrder()->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => false, //
        ]);

        User::create([

            'username' => 'alirod', // Username
            'email' => 'ali@gmail.com', // Email
            'fullname' => 'Ali Rodja', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://ui-avatars.com/api/?name=alirod&background=random', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_uuid' => Role::inRandomOrder()->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => false, //
        ]);

        User::create([
            'username' => 'aurelputri', // Username
            'email' => 'aurel@gmail.com', // Email
            'fullname' => 'Aurelia Melati', // Nama lengkap (gunakan fullname, bukan name)
            'image' => 'https://ui-avatars.com/api/?name=aurelputri&background=random', // Gambar profil default
            'password' => Hash::make('123'), // Hash untuk password
            'role_uuid' => Role::inRandomOrder()->first()->uuid, // Role ID (pastikan ada role dengan ID 1 di tabel roles)
            'isVerified' => true, //
        ]);
    }
}
