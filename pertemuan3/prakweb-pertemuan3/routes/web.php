<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Articles in: $category->name",
        'posts' => $category->posts->load('category', 'author')
    ]);
});

Route::get('/authors/{user:username}', function(User $user) {
    return view('posts', [
        'title' => "Articles by: $user->name",
        'posts' => $user->posts->load('category', 'author')
    ]);
});

Route::get('/about', [AboutController::class, 'index']);
