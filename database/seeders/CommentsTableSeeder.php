<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\JobVacancy;
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {

        # Uncomment this if you don't want to seed from the initial_data.json file
        // $faker = Faker::create();

        // $users = User::all();
        // $jobVacancies = JobVacancy::all();

        // foreach ($jobVacancies as $jobVacancy) {
        //     for ($i = 0; $i < 10; $i++) {
        //         Comment::create([
        //             'user_id' => $users->random()->id,
        //             'job_vacancy_id' => $jobVacancy->id,
        //             'content' => $faker->sentence(),
        //         ]);
        //     }
        // }

        $commentsData = json_decode(file_get_contents(database_path('seeders/initial_data.json')), true)['comments'];
        foreach ($commentsData as $commentData) {
            Comment::create($commentData);
        }
    }
}
