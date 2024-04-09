<form action="{{ route('comments.store') }}" method="POST" class="mt-6">
    @csrf
    <input type="hidden" name="job_vacancy_id" value="{{ $jobVacancy->id }}">
    <div class="mb-4">
        <label for="content" class="block text-gray-700 font-bold mb-2">Add Comment:</label>
        <textarea
            class="form-textarea w-full border-2 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500"
            name="content" id="comment" rows="3" required></textarea>
    </div>
    <button type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
</form>
