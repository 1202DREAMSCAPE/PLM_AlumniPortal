<?php

namespace Database\Factories;

use App\Models\EducationalBackground;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationalBackgroundFactory extends Factory
{
    protected $model = EducationalBackground::class;

    public function definition()
    {
        $degrees = [
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
        ];

        return [
            'school' => $this->faker->company,
            'educattain' => $this->faker->randomElement(['Bachelor\'s Degree', 'Master\'s Degree', 'Doctorate']),
            'degree' => $this->faker->randomElement($degrees),
            'gwa' => $this->faker->randomFloat(2, 1, 4), // Generates a GWA between 1.00 and 4.00
            'honors' => $this->faker->randomElement(['Cum Laude', 'Magna Cum Laude', 'Summa Cum Laude', null]),
            'startperiod' => $this->faker->dateTimeBetween('-10 years', '-5 years')->format('Y-m-d'), // Random date in the past 10 to 5 years
            'endperiod' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // Random date in the past 5 years to now
        ];
    }
}
