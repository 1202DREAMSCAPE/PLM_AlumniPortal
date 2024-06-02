<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Messages;
use App\Models\User;
use Faker\Factory as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            for ($i = 0; $i < 10; $i++) {
                $user->messages()->create([
                    'student_no' => $user->SNum,
                    'name' => $user->name,
                    'email' => $user->email,
                    'RDate' => now(),
                    'Description' => $faker->sentence,
                    'Status' => $faker->randomElement(['Unread', 'Read']),
                ]);
            }
        }
    }
}
