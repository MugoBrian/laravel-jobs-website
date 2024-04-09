<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::paginate(4);
        return view('job_vacancies.index', compact('jobVacancies'));
    }

    public function show($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $comments = $jobVacancy->comments()->paginate(6);
        return view('job_vacancies.show', compact('jobVacancy', 'comments'));
    }

    public function create()
    {
        return view('job_vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|integer|min:3|max:6',
            'employment_type' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date',
            'level' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id(); // Assign the authenticated user's ID to the user_id field

        JobVacancy::create($data);

        return redirect()->route('job_vacancies.index')->with('success', 'Job vacancy created successfully.');
    }

    public function edit($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        return view('job_vacancies.edit', compact('jobVacancy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:255',
            'application_deadline' => 'nullable|date',
            'level' => 'required|string|max:255',
        ]);

        $jobVacancy = JobVacancy::findOrFail($id);
        $data = $request->all();
        $data['user_id'] = auth()->id(); // Assign the authenticated user's ID to the user_id field
        $jobVacancy->update($data);

        return redirect()->route('job_vacancies.index')->with('success', 'Job vacancy updated successfully.');
    }

    public function destroy($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $jobVacancy->comments()->delete();
        $jobVacancy->delete();

        return redirect()->route('job_vacancies.index')->with('success', 'Job vacancy deleted successfully.');
    }
}
