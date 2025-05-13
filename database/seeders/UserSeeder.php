<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'last_name' => 'Master',
            'email' => 'admin@example.com',
            'phone' => '0601234567',
            'is_admin' => true,
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Stefan',
            'last_name' => 'Vujic',
            'email' => 'stefan@example.com',
            'phone' => '0619876543',
            'is_admin' => false,
            'password' => Hash::make('user123'),
        ]);
    }
}
