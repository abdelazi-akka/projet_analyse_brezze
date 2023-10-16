<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 0 //admin,

        ]);
        \App\Models\User::factory()->create([
            'name' => 'employe',
            'email' => 'employe@gmail.com',
            'password' => bcrypt('employe123'),
            'role' => 1 //employe

        ]);
    }
}
