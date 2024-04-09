<div class="bg-white shadow-md rounded-lg mb-3">
    <div class="p-4">
        <p class="text-gray-800 pt-2">{{ $comment->content }}</p>
        <p class="text-sm text-gray-600 pt-2">Posted by: {{ $comment->user->name }}</p>
        @auth
            @if (auth()->user()->isSuperUser() || auth()->user()->id == $comment->user_id)
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-800 hover:text-red-700 pt-2">Delete</button>
                </form>
            @endif
        @endauth
    </div>
</div>
