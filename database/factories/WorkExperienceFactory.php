<?php

namespace Database\Factories;

use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{
    protected $model = WorkExperience::class;

    public function definition()
    {
        return [
            'EmploymentStatus' => $this->faker->randomElement(['Full', 'Part', 'Intern']),
            'JobTitle' => $this->faker->jobTitle,
            'CompanyName' => $this->faker->company,
            'EmploymentCountry' => $this->faker->randomElement(['PH', 'US', 'CA', 'AU', 'NZ', 'SG', 'MY', 'JP']),
            'WorkIndustry' => $this->faker->word,
            'WorkSector' => $this->faker->word,
            'StartOfEmployment' => $this->faker->date(),
            'EndOfEmployment' => $this->faker->optional()->date(),
        ];
    }
}
