<?php

namespace Tests\Feature\Controllers;

use App\Models\JobVacancy;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobVacancyControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_job_vacancies_on_index_page()
    {
        $user = User::factory()->create();
        JobVacancy::factory()->create();

        $response = $this->actingAs($user)->get(route('job_vacancies.index'));

        $response->assertStatus(200)
            ->assertViewIs('job_vacancies.index')
            ->assertViewHas('jobVacancies');
    }

    /** @test */
    public function it_shows_a_job_vacancy_on_show_page()
    {
        $user = User::factory()->create();
        $jobVacancy = JobVacancy::factory()->create();


        $response = $this->actingAs($user)->get(route('job_vacancies.show', $jobVacancy->id));

        $response->assertStatus(200)
            ->assertViewIs('job_vacancies.show')
            ->assertViewHas('jobVacancy', $jobVacancy);
    }

    // Add tests for create, store, edit, update, and destroy methods similar to the ones above

    /** @test */
    public function it_deletes_job_vacancy_and_associated_comments()
    {
        $user = User::factory()->create();
        $jobVacancy = JobVacancy::factory()->create();
        $comments = Comment::factory()->count(3)->create(['job_vacancy_id' => $jobVacancy->id]);

        $response = $this->actingAs($user)->delete(route('job_vacancies.destroy', $jobVacancy->id));

        $response->assertRedirect(route('job_vacancies.index'))
            ->assertSessionHas('success', 'Job vacancy deleted successfully.');

        $this->assertDatabaseMissing('job_vacancies', ['id' => $jobVacancy->id]);
        foreach ($comments as $comment) {
            $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
        }
    }
}
