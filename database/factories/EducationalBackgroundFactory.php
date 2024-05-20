<?php

namespace Database\Factories;

use App\Models\EducationalBackground;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalBackground>
 */
class EducationalBackgroundFactory extends Factory
{
    protected $model = EducationalBackground::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school' => $this->faker->company,
            'educattain' => $this->faker->randomElement(['Bachelor\'s Degree', 'Master\'s Degree', 'Doctorate']),
            'degree' => $this->faker->jobTitle,
            'gwa' => $this->faker->randomFloat(2, 1, 4), // Generates a GWA between 1.00 and 4.00
            'honors' => $this->faker->randomElement(['Cum Laude', 'Magna Cum Laude', 'Summa Cum Laude', null]),
            'startperiod' => $this->faker->dateTimeBetween('-10 years', '-5 years')->format('Y-m-d'), // Random date in the past 10 to 5 years
            'endperiod' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // Random date in the past 5 years to now
        ];
    }
}
