<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // make sure this matches your model namespace
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'), // password will be hashed
        ]);
    }
}