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
            'name' => 'ini isi nama admin',
            'email' => 'admin@alamaya.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'profile_photo_path' => null, // Tambahkan ini
        ]);
    }
}
