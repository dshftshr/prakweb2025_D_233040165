<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Blog",
            "posts" => Post::with(['author', 'category'])->latest()->get()
        ]);
    }

    public function show($slug)
    {
        $post = Post::firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
