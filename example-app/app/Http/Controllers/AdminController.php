<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Community;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'posts' => Post::count(),
            'comments' => Comment::count(),
            'communities' => Community::count(),
        ];
        return view('admin.index', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function posts()
    {
        $posts = Post::with(['user', 'community'])->latest()->paginate(20);
        return view('admin.posts', compact('posts'));
    }

    public function communities()
    {
        $communities = Community::with('user')->withCount('posts')->latest()->paginate(20);
        return view('admin.communities', compact('communities'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Пост удалён!');
    }

    public function deleteCommunity(Community $community)
    {
        $community->delete();
        return back()->with('success', 'Сообщество удалено!');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'Пользователь удалён!');
    }

    public function toggleAdmin(User $user)
    {
        $user->update(['is_admin' => !$user->is_admin]);
        return back()->with('success', 'Роль изменена!');
    }
}
