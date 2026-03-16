<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        Comment::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'post_id' => $post->id,
        ]);

        return redirect()->back()->with('success', 'Комментарий добавлен!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Комментарий удалён!');
    }
}
