<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Post;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'value' => 'required|in:1,-1',
        ]);

        $vote = Vote::updateOrCreate(
            ['user_id' => auth()->id(), 'post_id' => $post->id],
            ['value' => $request->value]
        );

        $post->votes_count = $post->votes()->sum('value');
        $post->save();

        return redirect()->back();
    }
}
