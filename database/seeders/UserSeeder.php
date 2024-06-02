<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ContactInfo;
use App\Models\EducationalBackground;
use App\Models\WorkExperience;
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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@plm.edu.ph',
            'password' => Hash::make('admin'),
            'student_no' => '201900001', // Updated from 'SNum' to 'student_no'
            'ContactNum' => '09123456789',
            'TelNum' => '1234567',
            'Address' => '123 Admin St.',
            'Country' => 'Philippines',
            'City' => 'Manila',
            'Province' => 'Metro Manila',
            'Region' => 'NCR',
            'PostalCode' => '1000',
            'Linkedin' => 'https://linkedin.com/in/admin',
            'is_admin' => true,
            'Gender' => 'Male',
            'LName' => 'Admin',
            'MName' => 'Admin',
            'NameExt' => null,
            'MaidenName' => null,
            'Dept' => 'Administration',
            'Course' => 'Information Systems',
            'BDay' => '1980-01-01',
            'Graduated' => true,
            'POB' => 'Manila',
            'Nationality' => 'Filipino',
            'CivilStat' => 'Single',
            'Skills' => 'Administration, Management',
        ]);

        // Create educational background record for admin
        EducationalBackground::factory()->create([
            'user_id' => $admin->student_no, // Updated to use 'student_no'
            'school' => 'University of Admin',
            'educattain' => 'Bachelor\'s Degree',
            'degree' => 'Bachelor of Science in Information Systems',
            'gwa' => '3.8',
            'honors' => 'Magna Cum Laude',
            'startperiod' => '2015-09-01',
            'endperiod' => '2019-05-31',
        ]);

        // Create contact info for admin
        ContactInfo::create([
            'user_id' => $admin->student_no, // Updated to use 'student_no'
            'email' => $admin->email,
            'TelNum' => $admin->TelNum,
            'ContactNum' => $admin->ContactNum,
            'home_address' => $admin->Address,
            'country' => $admin->Country,
            'city' => $admin->City,
            'province' => $admin->Province,
            'region' => $admin->Region,
            'postal_code' => $admin->PostalCode,
            'linkedin_account_link' => $admin->Linkedin,
        ]);

        // Create work experience for admin
        WorkExperience::create([
            'user_id' => $admin->student_no, // Updated to use 'student_no'
            'EmploymentStatus' => 'Full',
            'JobTitle' => 'Administrator',
            'CompanyName' => 'PLM',
            'EmploymentCountry' => 'PH',
            'WorkIndustry' => 'Education',
            'WorkSector' => 'Public',
            'StartOfEmployment' => '2020-01-01',
            'EndOfEmployment' => null,
        ]);

        // Create other users, their contact info, educational background, and work experience
        User::factory()
            ->count(20)
            ->create([
                'password' => Hash::make('admin'), // Set the password for all users
            ])
            ->each(function ($user) use ($faker) {
                // Create contact info for user
                ContactInfo::create([
                    'user_id' => $user->student_no, // Updated to use 'student_no'
                    'email' => $user->email,
                    'TelNum' => $user->TelNum,
                    'ContactNum' => $user->ContactNum,
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
                    'user_id' => $user->student_no, // Updated to use 'student_no'
                    'school' => 'University of ' . $user->name,
                    'educattain' => 'Bachelor\'s Degree',
                    'degree' => $faker->randomElement([
                        'Bachelor of Science in Information Systems',
                        'Bachelor of Science in Computer Engineering',
                        'Bachelor of Science in Computer Science',
                        'Bachelor of Science in Accountancy',
                        'Bachelor of Science in Business Administration',
                        'Bachelor of Science in Hotel and Restaurant Management',
                        'Bachelor of Science in Nursing',
                        'Bachelor of Science in Medical Technology',
                        'Bachelor of Science in Pharmacy',
                        'Bachelor of Science in Physical Therapy',
                        'Bachelor of Science in Education',
                    ]),
                    'gwa' => $faker->randomFloat(2, 1, 4), // Random GWA between 1.00 and 4.00
                    'honors' => $faker->randomElement(['Cum Laude', 'Magna Cum Laude', 'Summa Cum Laude', null]),
                    'startperiod' => $faker->dateTimeBetween('-10 years', '-5 years')->format('Y-m-d'), // Random start period
                    'endperiod' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // Random end period
                ]);

                // Create work experience for user
                $startOfEmployment = $faker->dateTimeBetween('-10 years', '-5 years');
                $endOfEmployment = $faker->optional()->dateTimeBetween($startOfEmployment, 'now');

                WorkExperience::create([
                    'user_id' => $user->student_no, // Updated to use 'student_no'
                    'EmploymentStatus' => $faker->randomElement(['Full', 'Part', 'Intern']),
                    'JobTitle' => $faker->jobTitle,
                    'CompanyName' => $faker->company,
                    'EmploymentCountry' => $faker->randomElement(['PH', 'US', 'CA', 'AU', 'NZ', 'SG', 'MY', 'JP']),
                    'WorkIndustry' => $faker->word,
                    'WorkSector' => $faker->word,
                    'StartOfEmployment' => $startOfEmployment->format('Y-m-d'), // Random start period
                    'EndOfEmployment' => $endOfEmployment ? $endOfEmployment->format('Y-m-d') : null, // Optional end period
                ]);
            });
    }
}
