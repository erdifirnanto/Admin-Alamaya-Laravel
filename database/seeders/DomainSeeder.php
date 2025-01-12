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
                'expired' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+10 days')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+20 days')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'status' => $faker->randomElement(['active', 'in_active', 'expired', 'redemtion']),
                'join_date' => $expiredDate->format('Y-m-d'),
            ]);
        }
    }
}
