<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil Seeder
        $this->call([
            RoleSeeder::class, // Tambahkan RoleSeeder di sini
            UserSeeder::class, // Jangan lupa seeder lainnya
        ]);
    }
}