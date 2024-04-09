<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobVacancy;
use App\Models\User;
use Faker\Factory as Faker;

class JobVacanciesTableSeeder extends Seeder
{
    public function run()
    {
        # Uncomment this if you don't want to seed from the initial_data.json file
        // $faker = Faker::create();

        // $jobTitles = [
        //     'Laravel Developer',
        //     'Senior Laravel Developer',
        //     'Backend Developer (Laravel)',
        //     'Full Stack Laravel Developer',
        //     'PHP Laravel Developer',
        //     'Laravel Engineer',
        //     'Laravel Web Developer',
        //     'Laravle PHP Intern'
        // ];
        // $users = User::all();

        // foreach ($jobTitles as $title) {
        //     JobVacancy::create([
        //         'title' => $title,
        //         'user_id' => $users->random()->id,
        //         'description' => $faker->paragraph,
        //         'company_name' => $faker->company,
        //         'location' => $faker->city,
        //         'salary_range' => $faker->randomNumber(6),
        //         'employment_type' => $faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Freelance']),
        //         'application_deadline' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        //         'level' => $faker->randomElement(['Junior', 'Intermediate', 'Experienced'])
        //     ]);
        // }

        // Seed job vacancies
        $jobVacanciesData = json_decode(file_get_contents(database_path('seeders/initial_data.json')), true)['job_vacancies'];
        foreach ($jobVacanciesData as $jobVacancyData) {
            JobVacancy::create($jobVacancyData);
        }
    }
}
