<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{

    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'requirements' => implode(',', $this->faker->words(5)),
            'remote' => $this->faker->boolean(),
            'company_name' => $this->faker->company(),
            'company_logo' => "not available",
            'contact_email' => $this->faker->companyEmail(),
            'job_type' => $this->faker->randomElement(['Full Time', 'Part time', 'Contract', 'Internship']),
            'category' => $this->faker->word(),
            'description' => $this->faker->sentences(3, true),
            'salary' => $this->faker->numberBetween(10000, 90000),
        ];
    }
}
