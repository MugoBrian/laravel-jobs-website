<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        # Uncomment this if you don't want to seed from the initial_data.json file
        // // Create student x user
        // $user_student = User::create([
        //     'name' => 'student x',
        //     'email' => 'student-x@london.ac.uk',
        //     'password' => Hash::make('password1234'),
        //     'role' => 'user',
        // ]);
        // event(new Registered($user_student));

        // // Create super user admin
        // $admin = User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@laraveljobs-app.com',
        //     'password' => Hash::make('superuser1234'),
        //     'role' => 'superuser', // Assuming you have a 'role' column in the users table
        // ]);

        // event(new Registered($admin));


        //  // Create 4 additional fake regular users
        //  $fake_users = User::factory(4)->create();
        //  event(new Registered($fake_users));

        // Seed users
        $usersJson = file_get_contents(database_path('seeders/initial_data.json'));
        $usersData = json_decode($usersJson, true)['users'];
        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
