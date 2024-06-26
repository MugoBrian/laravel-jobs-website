## Laravel Job Vacancy Website

This is a laravel job vacancy website built with Laravel and Blad Templating with Breeze for authentication
The platform uses SQLite as the database, hence no extra database configuration needed.

### Setting Up The Environment

1. Navigate the root folder `cd laravel-jobs-website`
2. `npm install` in the root of the folder to install the node_modules
3. `npm run dev` to start vite and tailwind css dependencies
4. `cp .env .env.example` to get the .env file.
5. Change the `DB_CONNECTION` variable to `sqlite`.
6. `php artisan migrate` to run the migrations
7. `php artisan db:seed` to seed the Users, Job Vacancies and Comments data from the `seeders/initial_data.json` file
8. `php artisan serve` to start the application

#### Running the tests

`php artisan tests`
