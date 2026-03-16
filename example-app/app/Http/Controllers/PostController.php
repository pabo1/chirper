<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Community;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'community'])->latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function create(Community $community)
    {
        return view('posts.create', compact('community'));
    }

    public function store(Request $request, Community $community)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
            'community_id' => $community->id,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Пост создан!');
    }

    public function show(Post $post)
    {
        $post->load(['user', 'community', 'comments.user']);
        return view('posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Пост удалён!');
    }
}
