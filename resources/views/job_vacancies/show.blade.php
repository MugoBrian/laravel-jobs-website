@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">{{ $jobVacancy->title }}</h1>
        <p class="mt-2">{{ $jobVacancy->description }}</p>
        <p class="mt-2"><strong>Company:</strong> {{ $jobVacancy->company_name }}</p>
        <p class="mt-2"><strong>Location:</strong> {{ $jobVacancy->location }}</p>
        <p class="mt-2"><strong>Salary Range:</strong> {{ $jobVacancy->salary_range }}</p>
        <p class="mt-2"><strong>Employment Type:</strong> {{ $jobVacancy->employment_type }}</p>
        <p class="mt-2"><strong>Application Deadline:</strong> {{ $jobVacancy->application_deadline }}</p>
        <a href="{{ route('job_vacancies.index') }}"
            class="mt-4 inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Back
            to Job Vacancies</a>

        <hr class="my-8">
        @if (Session::has('success'))
            @include('job_vacancies.partials.success-notification')
        @endif

        @if (Auth::user())
            <a href="#" id="toggle-comment-form"
                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Leave a
                Comment</a>

            <div id="comment-form" style="display: none;">
                @include('comments._form', ['jobVacancy' => $jobVacancy])
            </div>
        @else
            <a href={{ route('login') }}
                class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login To
                Comment</a>
        @endif

        <hr class="my-4">

        <h2 class="text-2xl font-bold">Comments</h2>
        @if ($comments->count() > 0)
            @foreach ($comments as $comment)
                @include('comments._comment', ['comment' => $comment])
            @endforeach
            {{ $jobVacancy->comments()->paginate(6)->links() }}
        @else
            <p class="mt-4">No comments yet.</p>
        @endif







    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('toggle-comment-form').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('comment-form').style.display = 'block';
        });
    </script>
@endpush
