<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 50) as $index) {
            DB::table('projects')->insert([
                'project_name' => $faker->sentence(3),
                'category' => $faker->randomElement(['Maintenance', 'Re-Design', 'Hosting']),
                'project_handler' => $faker->randomElement(['Widia Hadi Purwanti', 'Handika Wicaksana']),
                'status' => 'new_project',
                'tanggal_masuk_project' => $faker->date(),
                'deadline' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
                'deadline' => $faker->dateTimeBetween('now', '+10 days')->format('Y-m-d'),
                'deadline' => $faker->dateTimeBetween('now', '+20 days')->format('Y-m-d'),
                'deadline' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'client_name' => $faker->name,
                'company_name' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('08##########'),
                'address' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
