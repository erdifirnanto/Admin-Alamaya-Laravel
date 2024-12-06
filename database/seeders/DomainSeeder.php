<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Domain;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DomainSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $reminderIntervals = [25, 20, 15, 5, 4, 3, 2, 1, 30];
        // Membuat 10 data domain palsu
        foreach (range(1, 300) as $index) {
            $interval = $faker->randomElement($reminderIntervals);
            $expiredDate = Carbon::now()->addDays($interval);

            Domain::create([
                'project_name' => $faker->company, // Nama proyek acak
                'domain' => $faker->domainName, // Nama domain acak
                'expired' => $expiredDate->format('Y-m-d'),
                // 'expired' => $expiredDate->toDateString()
                // 'expired' => $faker->date('Y-m-d', '+1 year'),
                // 'expired' => Carbon::instance($faker->dateTimeBetween('now', '+1 year')), // Menggunakan Carbon untuk tanggal kedaluwarsa
            ]);
        }
    }
}
