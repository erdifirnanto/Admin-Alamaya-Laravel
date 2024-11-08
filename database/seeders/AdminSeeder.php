<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Saya Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'profile_photo_path' => null, // Tambahkan ini
        ]);

        User::create([
            'name' => 'Saya Staff',
            'email' => 'rena@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'profile_photo_path' => null, // Tambahkan ini
        ]);

        User::create([
            'name' => 'Saya Staff',
            'email' => 'erdi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'profile_photo_path' => null, // Tambahkan ini
        ]);
    }
}
