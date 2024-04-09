@extends('layouts.app')

@section('content')
    @if (!Auth::user())
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">

                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-grey-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-grey-700 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif

            </div>
        @endif
    @endif
    <div class="container mx-auto px-4 mt-16">
        <h1 class="text-3xl font-bold mb-4">Job Vacancies</h1>
        @if (Session::has('success'))
            @include('job_vacancies.partials.success-notification')
        @endif
        @if (Auth::user())
            <div class="container mb-24">
                <a href="{{ route('job_vacancies.create') }}"
                    class="float-right bg-blue-500 hover:bg-blue-700 text-right text-white font-bold py-2 px-4 rounded">Post
                    Job
                    Vacancy</a>

            </div>
        @else
            <div class="container mb-24">
                <a href="{{ route('login') }}"
                    class="float-right bg-blue-500 hover:bg-blue-700 text-right text-white font-bold py-2 px-4 rounded">
                    Login To Post A Job Vacancy</a>

            </div>
        @endif

        @foreach ($jobVacancies as $jobVacancy)
            <div class="bg-white shadow-md rounded-lg mb-6 mt-8">
                <div class="px-6 py-4">
                    <h5 class="text-xl font-semibold">{{ $jobVacancy->title }}</h5>
                    <p class="text-gray-700 mt-2">{{ $jobVacancy->description }}</p>
                    <p class="text-gray-700 mt-2"><strong>Location:</strong> {{ $jobVacancy->location }}</p>
                    <p class="text-gray-700 mt-2"><strong>Salary Range:</strong> {{ $jobVacancy->salary_range }}</p>
                    <p class="text-gray-700 mt-2"><strong>Employment Type:</strong> {{ $jobVacancy->employment_type }}
                    </p>
                    <a href="{{ route('job_vacancies.show', $jobVacancy->id) }}"
                        class="mt-2 text-blue-500 inline-block underline font-medium py-2 pl-0 rounded">View
                        Details</a>
                    @auth
                        @if (auth()->user()->id == $jobVacancy->user_id)
                            <form action="{{ route('job_vacancies.destroy', $jobVacancy->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-800 text-white ml-4 hover:bg-red-700 pt-2 mt-4 inline-block text-white font-medium py-2 px-4 rounded ">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
        {{ $jobVacancies->links() }}
    </div>
@endsection
