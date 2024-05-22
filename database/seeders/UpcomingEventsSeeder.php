<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UpcomingEvents;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UpcomingEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $locations = [
            'SMX Convention Center, Pasay, Metro Manila',
            'Waterfront Cebu City Hotel & Casino, Cebu City',
            'SM Lanang Premier, Davao City',
            'Baguio Convention Center, Baguio City',
            'White Beach, Boracay',
        ];

        for ($i = 0; $i < 10; $i++) {
            UpcomingEvents::create([
                'EventName' => $faker->sentence(3),
                'EDate' => Carbon::now()->addDays(rand(1, 365)),
                'ELoc' => $faker->randomElement($locations),
                'EDesc' => $faker->paragraph,
                'TimeStart' => $faker->time('H:i:s', 'now'),
                'TimeEnd' => $faker->time('H:i:s', '+2 hours'),
                'Accepted' => $faker->boolean(80), // 80% chance of being accepted
            ]);
        }
    }
}
