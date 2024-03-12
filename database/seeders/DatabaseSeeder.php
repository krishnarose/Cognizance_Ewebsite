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
            'name' => 'Super Admin',
            'email' => 'krishnarose2001@gmail.com',
            'password' => '12345678',
            'type' => '1',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Common User',
            'email' => 'user@gmail.com',
            'password' => '12345678',
            'type' => '0',
        ]);
    }
}
