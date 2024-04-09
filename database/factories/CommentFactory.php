<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
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
        $jobVacancies = JobVacancy::all();

        return [

            'user_id' => $users->random()->id,
            'job_vacancy_id' => $jobVacancies->random()->id,
            'content' => $faker->sentence(),


        ];
    }
}
