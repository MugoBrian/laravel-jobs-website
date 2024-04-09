@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Edit Job Vacancy</h1>
        <form action="{{ route('job_vacancies.update', $jobVacancy->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="{{ $jobVacancy->title }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:border-gray-300 rounded-md"
                    required>
            </div>
            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:border-gray-300 rounded-md"
                    required>{{ $jobVacancy->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="company_name" class="block font-medium text-gray-700">Company Name</label>
                <input type="text" id="company_name" name="company_name" value="{{ $jobVacancy->company_name }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location" value="{{ $jobVacancy->location }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="salary_range" class="block text-sm font-medium text-gray-700">Salary Range</label>
                <input type="number" id="salary_range" name="salary_range" value="{{ $jobVacancy->salary_range }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="employment_type" class="block text-sm font-medium text-gray-700">Employment Type</label>
                <input type="text" id="employment_type" name="employment_type" value="{{ $jobVacancy->employment_type }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="application_deadline" class="block text-sm font-medium text-gray-700">Application
                    Deadline</label>
                <input type="date" id="application_deadline" name="application_deadline"
                    value="{{ $jobVacancy->application_deadline }}"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <select id="level" name="level"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="Junior" {{ $jobVacancy->level == 'Junior' ? 'selected' : '' }}>Junior</option>
                    <option value="Intermediate" {{ $jobVacancy->level == 'Intermediate' ? 'selected' : '' }}>Intermediate
                    </option>
                    <option value="Experienced" {{ $jobVacancy->level == 'Experienced' ? 'selected' : '' }}>Experienced
                    </option>
                </select>
            </div>
            <div class="mb-4">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update</button>
                <a href="{{ route('job_vacancies.index') }}"
                    class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Cancel</a>
            </div>
        </form>
    </div>
@endsection
