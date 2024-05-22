<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PartnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $partnerships = [];

        for ($i = 0; $i < 10; $i++) {
            $startDate = $faker->dateTimeBetween('-2 years', 'now');
            $endDate = $faker->optional()->dateTimeBetween($startDate, '+1 years');

            $partnerships[] = [
                'ComName' => $faker->company,
                'EmailAdd' => $faker->companyEmail,
                'Address' => substr($faker->address, 0, 50), // Truncate to 50 characters
                'CPerson' => $faker->name,
                'PartType' => $faker->randomElement(['General Partnership', 'Limited Partnership', 'Limited Liability Partnership']),
                'StartDate' => $startDate->format('Y-m-d'),
                'EndDate' => $endDate ? $endDate->format('Y-m-d') : null,
                'Accepted' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('partnerships')->insert($partnerships);
    }
}
