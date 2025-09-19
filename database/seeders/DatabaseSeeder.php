<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call AdminSeeder to create admin
        $this->call(AdminSeeder::class);

        // Seed normal users using factory
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'is_admin' => 0, // normal user
        ]);

        // Seed books
        $this->call(BookSeeder::class);
    }
}
