<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

User::create([
    'name' => 'Toko Admin',
    'email' => 'admin@toko.com',
    'password' => Hash::make('password'),
    'role' => 'admin',
]);

    }
}
