@extends('layouts.app')

@section('content')
    <div class="container mb-24">
        <a href="{{ route('job_vacancies.index') }}"
            class="mt-4 mb-16 float-right inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Back
            to Job Vacancies</a>

    </div>
    <div class="container mx-auto mt-16">
        <h1 class="text-3xl font-semibold mb-6 text-center">Create Job Vacancy</h1>
        <form action="{{ route('job_vacancies.store') }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" required
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4" required
                    class="form-textarea mt-1 block w-full rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" id="company_name" name="company_name"
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location"
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="salary_range" class="block text-sm font-medium text-gray-700">Salary Range</label>
                <input type="number" id="salary_range" name="salary_range"
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
                <input type="text" id="employment_type" name="employment_type"
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application
                    Deadline</label>
                <input type="date" id="application_deadline" name="application_deadline"
                    class="form-input mt-1 block w-full rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <select id="level" name="level" required class="form-select mt-1 block w-full rounded-md shadow-sm">
                    <option value="Junior">Junior</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Experienced">Experienced</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
        </form>
    </div>
@endsection
