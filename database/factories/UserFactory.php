<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    protected static ?string $password = null;

    public function definition(): array
    {
        $departments = [
            'College of Engineering and Technology' => [
                'Bachelor of Science in Civil Engineering',
                'Bachelor of Science in Electrical Engineering',
                'Bachelor of Science in Electronics and Communications Engineering',
                'Bachelor of Science in Mechanical Engineering',
                'Bachelor of Science in Computer Engineering',
                'Bachelor of Science in Computer Science',
            ],
            'College of Science' => [
                'Bachelor of Science in Biology',
                'Bachelor of Science in Chemistry',
                'Bachelor of Science in Mathematics',
                'Bachelor of Science in Physics',
            ],
            'College of Arts and Letters' => [
                'Bachelor of Arts in Communication',
                'Bachelor of Arts in English',
                'Bachelor of Arts in Filipino',
                'Bachelor of Arts in History',
                'Bachelor of Arts in Philosophy',
                'Bachelor of Arts in Political Science',
            ],
            'College of Nursing' => [
                'Bachelor of Science in Nursing',
            ],
            'College of Business and Management' => [
                'Bachelor of Science in Accountancy',
                'Bachelor of Science in Business Administration',
                'Bachelor of Science in Hospitality Management',
                'Bachelor of Science in Tourism Management',
            ],
            'College of Law' => [
                'Bachelor of Laws (LLB)',
            ],
            'College of Architecture and Urban Planning' => [
                'Bachelor of Science in Architecture',
            ],
            'College of Education' => [
                'Bachelor of Elementary Education',
                'Bachelor of Secondary Education',
            ],
        ];

        // Randomly select a department and course
        $department = $this->faker->randomElement(array_keys($departments));
        $course = $this->faker->randomElement($departments[$department]);

        $graduatedYear = $this->faker->numberBetween(2000, 2024);
        $snumYear = $graduatedYear - $this->faker->numberBetween(4, 6);
        $snum = $snumYear . $this->faker->unique()->numerify('#####');

        return [
            'SNum' => $snum,
            'name' => $this->faker->firstName,
            'email' => $this->faker->unique()->userName . '@plm.edu.ph',
            'password' => static::$password ??= Hash::make('password'),
            'Gender' => $this->faker->randomElement(['Male', 'Female']),
            'LName' => $this->faker->lastName,
            'MName' => $this->faker->lastName,
            'NameExt' => $this->faker->optional()->suffix,
            'MaidenName' => $this->faker->lastName,
            'Dept' => $department,
            'Course' => $course,
            'BDay' => $this->faker->date(),
            'Graduated' => $graduatedYear,
            'POB' => $this->faker->city,
            'ContactNum' => '09' . $this->faker->unique()->numerify('#########'),
            'TelNum' => $this->faker->numerify('########'),
            'Linkedin' => 'https://linkedin.com/in/' . $this->faker->userName,
            'Nationality' => $this->faker->country,
            'CivilStat' => $this->faker->randomElement(['Single', 'Married']),
            'Address' => $this->faker->address,
            'Country' => 'Philippines', // Set to Philippines
            'Province' => $this->faker->state,
            'Region' => $this->faker->state,
            'City' => $this->faker->city,
            'PostalCode' => $this->faker->postcode,
            'Skills' => $this->faker->words(5, true),
        ];
    }
}
