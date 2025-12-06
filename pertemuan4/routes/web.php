<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

// Halaman Postingan
Route::get('/post', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);

// Halaman Kategori
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Articles in: $category->name",
        'posts' => $category->posts->load('category', 'author')
    ]);
});

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

// Halaman Penulis
Route::get('/authors/{user:username}', function(User $user) {
    return view('posts', [
        'title' => "Articles by: $user->name",
        'posts' => $user->posts->load('category', 'author')
    ]);
});

// Halaman About
Route::get('/about', [AboutController::class, 'index']);

// Halaman Login & Logout
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Halaman Registrasi
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Halaman Dashboard (hanya untuk user yang sudah login)
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// Dashboard Postingan (CRUD Post)
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Dashboard Kategori (CRUD Category - hanya untuk admin)
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
