<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'last_name' => 'Master',
            'email' => 'admin@example.com',
            'phone' => '0601234567',
            'is_admin' => true,
            'password' => Hash::make('admin123'),
        ]);

        // Regular users
        User::create([
            'name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '0611111111',
            'is_admin' => false,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'phone' => '0622222222',
            'is_admin' => false,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Milan',
            'last_name' => 'Petrovic',
            'email' => 'milan@example.com',
            'phone' => '0633333333',
            'is_admin' => false,
            'password' => Hash::make('password'),
        ]);
    }
}
