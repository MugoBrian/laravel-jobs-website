<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="{{ route('job_vacancies.index') }}"
            class="ml-3 mb-16 inline-flex items-left float-right px-4 py-2  font-medium text-blue-700 underline hover:text-blue-500">View
            Job Vacancies -></a>
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-2 gap-4">
                <!-- Job Vacancies Card -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-4">Job Vacancies Posted</h2>
                    <div class="flex items-center mb-2">
                        <div class="text-3xl font-bold mr-2">{{ $jobVacancies->count() }}</div>
                        <div class="text-gray-600">Vacancies</div>
                    </div>
                    <a href="{{ route('job_vacancies.create') }}"
                        class="block mt-4 text-blue-500 hover:underline">Create
                        Job Vacancy</a>
                </div>

                <!-- Comments Card -->
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-lg font-semibold mb-4">Comments Posted</h2>
                    <div class="flex items-center mb-2">
                        <div class="text-3xl font-bold mr-2">{{ $comments->count() }}</div>
                        <div class="text-gray-600">Comments</div>
                    </div>
                    <div class="text-sm">
                        @foreach ($comments as $comment)
                            <div class="mb-1">
                                <p>Hello</p>
                                <a href="{{ route('job_vacancies.show', $comment->job_vacancy_id) }}"
                                    class="text-blue-500 hover:underline">{{ $comment->content }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- Job Vacancies Table -->
                            <h2 class="text-lg font-semibold mb-4">Job Vacancies Posted</h2>
                            @if (Session::has('success'))
                                @include('job_vacancies.partials.success-notification')
                            @endif
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th rowspan="2"
                                            class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @if ($jobVacancies->count() > 0)

                                        @foreach ($jobVacancies as $jobVacancy)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-gray-900">{{ $jobVacancy->title }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap font-medium">
                                                    <a href="{{ route('job_vacancies.edit', $jobVacancy->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>

                                                </td>
                                                <td>
                                                    <form action="{{ route('job_vacancies.destroy', $jobVacancy->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-600 hover:text-red-900">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="pt-8">
                                            <td class="text-center pt-4" rowspan="3">
                                                You have not posted any job vancancies yet!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
