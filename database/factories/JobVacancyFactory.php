<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        $users = User::all();
        return [
            //
            'title' => "Laravel Developer",
            'user_id' => $users->random()->id,
            'description' => $faker->paragraph,
            'company_name' => $faker->company,
            'location' => $faker->city,
            'salary_range' => $faker->randomNumber(6),
            'employment_type' => $faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Freelance']),
            'application_deadline' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'level' => $faker->randomElement(['Junior', 'Intermediate', 'Experienced'])
        ];
    }
}
