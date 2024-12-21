<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) { // Generate 10 entries
            DB::table('teams')->insert([
                'personil_name' => $faker->name,
                'division' => $faker->randomElement(['Marketing', 'Finance', 'IT', 'HR', 'Operations']),
                'project_handle' => $faker->sentence(3), // Example: "Website Redesign Project"
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
