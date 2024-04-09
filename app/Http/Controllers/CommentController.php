<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'job_vacancy_id' => 'required|exists:job_vacancies,id',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->job_vacancy_id = $request->job_vacancy_id;
        $comment->user_id = auth()->id(); // Assuming user is authenticated
        $comment->save();

        
        return back()->with('success', 'Comment added successfully.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
