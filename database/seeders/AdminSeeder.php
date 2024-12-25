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
            'name' => 'Widia Hadi Purwanti',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'profile_photo_path' => null, // Tambahkan ini
        ]);

        User::create([
            'name' => 'Hendra Kalijaga',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'profile_photo_path' => null, // Tambahkan ini
        ]);

        User::create([
            'name' => 'Rena Amalia Afifah',
            'email' => 'rena@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'profile_photo_path' => null, // Tambahkan ini
        ]);

        User::create([
            'name' => 'Erdi Vernanto',
            'email' => 'erdivernanto@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'profile_photo_path' => null, // Tambahkan ini
        ]);
    }
}
