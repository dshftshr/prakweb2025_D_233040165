<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $name = auth()->check() ? auth()->user()->name : 'Prakweb';
        
        $about = (object) [
            'name' => $name,
            'job' => 'Pengembang Web & Pembuat Konten',
            'description' => "Halo! Saya $name. Selamat datang di blog pribadi saya. Di sini saya berbagi pengalaman, tutorial, dan wawasan terbaru seputar dunia pengembangan web dan teknologi.",
            'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80'
        ];

        return view('about', [
            'title' => 'About',
            'about' => $about
        ]);
    }
}
