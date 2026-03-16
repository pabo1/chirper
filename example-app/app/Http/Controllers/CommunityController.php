<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::withCount('posts')->latest()->get();
        return view('communities.index', compact('communities'));
    }

    public function create()
    {
        return view('communities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:communities',
            'description' => 'nullable|string',
        ]);

        Community::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('communities.index')->with('success', 'Сообщество создано!');
    }

    public function show(Community $community)
    {
        $posts = $community->posts()->with('user')->latest()->get();
        return view('communities.show', compact('community', 'posts'));
    }

    public function edit(Community $community) {}
    public function update(Request $request, Community $community) {}

    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Сообщество удалено!');
    }
}
