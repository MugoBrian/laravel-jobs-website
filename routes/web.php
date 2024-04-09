<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobVacancyController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use App\Models\JobVacancy;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/job_vacancies');
});

Route::get('/dashboard', function () {
    $user = auth()->user()->id;
    $jobVacancies = JobVacancy::where('user_id', $user)->get();
    $comments = Comment::where('user_id', $user);

    return view('dashboard', compact('jobVacancies', 'comments'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes for Job Vacancies
    Route::get('/job_vacancies/create', [JobVacancyController::class, 'create'])->name('job_vacancies.create');
    Route::post('/job_vacancies', [JobVacancyController::class, 'store'])->name('job_vacancies.store');
    Route::get('/job_vacancies/{id}/edit', [JobVacancyController::class, 'edit'])->name('job_vacancies.edit');
    Route::put('/job_vacancies/{id}', [JobVacancyController::class, 'update'])->name('job_vacancies.update');
    Route::delete('/job_vacancies/{id}', [JobVacancyController::class, 'destroy'])->name('job_vacancies.destroy');

    // Routes for Comments
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
Route::get('/job_vacancies/{id}', [JobVacancyController::class, 'show'])->name('job_vacancies.show');
Route::get('/job_vacancies', [JobVacancyController::class, 'index'])->name('job_vacancies.index');

require __DIR__ . '/auth.php';
