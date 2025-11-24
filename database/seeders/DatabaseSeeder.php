<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Panggil ApbdesSeeder di sini
            ApbdesSeeder::class,
            // ... (Jika ada seeder lain, seperti UserSeeder, dll.)
        ]);
    }
}