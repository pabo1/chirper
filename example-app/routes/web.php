<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\AdminController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    // Сабреддиты
    Route::resource('communities', CommunityController::class);

    // Посты
    Route::get('communities/{community}/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('communities/{community}/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Комментарии
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Голосование
    Route::post('posts/{post}/vote', [VoteController::class, 'store'])->name('votes.store');
});

Route::get('communities/{community}', [CommunityController::class, 'show'])->name('communities.show');
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/posts', [AdminController::class, 'posts'])->name('posts');
    Route::get('/communities', [AdminController::class, 'communities'])->name('communities');
    Route::delete('/posts/{post}', [AdminController::class, 'deletePost'])->name('posts.delete');
    Route::delete('/communities/{community}', [AdminController::class, 'deleteCommunity'])->name('communities.delete');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggle-admin');
});

require __DIR__.'/auth.php';
