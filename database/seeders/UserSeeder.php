<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ContactInfo;
use App\Models\EducationalBackground;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@plm.edu.ph',
            'password' => Hash::make('admin'),
            'SNum' => '201900001',
            'ContactNum' => '09123456789',
            'TelNum' => '1234567',
            'Address' => '123 Admin St.',
            'Country' => 'Philippines',
            'City' => 'Manila',
            'Province' => 'Metro Manila',
            'Region' => 'NCR',
            'PostalCode' => '1000',
            'Linkedin' => 'https://linkedin.com/in/admin',
        ]);

        // Create educational background record for admin
        EducationalBackground::factory()->create([
            'user_id' => $admin->id,
            'school' => 'University of Admin',
            'educattain' => 'Bachelor\'s Degree',
            'degree' => 'Administration',
            'gwa' => '3.8',
            'honors' => 'Magna Cum Laude',
            'startperiod' => '2015-09-01',
            'endperiod' => '2019-05-31',
        ]);

        // Create contact info for admin
        ContactInfo::create([
            'user_id' => $admin->id,
            'email' => $admin->email,
            'telephone_number' => $admin->TelNum,
            'cellphone_number' => $admin->ContactNum,
            'home_address' => $admin->Address,
            'country' => $admin->Country,
            'city' => $admin->City,
            'province' => $admin->Province,
            'region' => $admin->Region,
            'postal_code' => $admin->PostalCode,
            'linkedin_account_link' => $admin->Linkedin,
        ]);

        // Create other users, their contact info, and educational background
        User::factory()
            ->count(20)
            ->create()
            ->each(function ($user) use ($faker) {
                // Create contact info for user
                ContactInfo::create([
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'telephone_number' => $user->TelNum,
                    'cellphone_number' => $user->ContactNum,
                    'home_address' => $user->Address,
                    'country' => $user->Country,
                    'city' => $user->City,
                    'province' => $user->Province,
                    'region' => $user->Region,
                    'postal_code' => $user->PostalCode,
                    'linkedin_account_link' => $user->Linkedin,
                ]);

                // Create educational background for user
                EducationalBackground::factory()->create([
                    'user_id' => $user->id,
                    'school' => 'University of ' . $user->name,
                    'educattain' => 'Bachelor\'s Degree',
                    'degree' => 'Course of ' . $user->name,
                    'gwa' => $faker->randomFloat(2, 1, 4), // Random GWA between 1.00 and 4.00
                    'honors' => $faker->randomElement(['Cum Laude', 'Magna Cum Laude', 'Summa Cum Laude', null]),
                    'startperiod' => $faker->dateTimeBetween('-10 years', '-5 years')->format('Y-m-d'), // Random start period
                    'endperiod' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // Random end period
                ]);
            });
    }
}
