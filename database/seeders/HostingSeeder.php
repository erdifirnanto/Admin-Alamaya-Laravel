<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class HostingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('hostings')->insert([
                'project_name' => $faker->company(),
                'package' => $faker->randomElement(['Basic', 'Standard', 'Premium', 'Enterprise']),
                'domain' => $faker->domainName(),
                'status' => 'new_project',
                'join_date' => $faker->date(),
                'expired' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+10 days')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+20 days')->format('Y-m-d'),
                'expired' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}