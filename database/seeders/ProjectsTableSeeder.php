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
                'category' => $faker->randomElement(['1', '2']),
                'pic_name' => $faker->randomElement(['Widia Hadi Purwanti', 'Handika Wicaksana']),
                'status' => 'New Project',
                'tanggal_masuk_project' => $faker->date(),
                'deadline' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
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
