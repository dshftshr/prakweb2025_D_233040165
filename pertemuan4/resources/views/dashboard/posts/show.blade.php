@extends('layouts.dashboard')

@section('container')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="max-w-3xl">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

        <div class="flex space-x-2 mb-6">
            <a href="/dashboard/posts" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <span data-feather="arrow-left" class="mr-2 h-4 w-4"></span> Kembali ke postingan saya
            </a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <span data-feather="edit" class="mr-2 h-4 w-4"></span> Edit
            </a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline-block">
                @method('delete')
                @csrf
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Apakah anda yakin?')">
                    <span data-feather="x-circle" class="mr-2 h-4 w-4"></span> Hapus
                </button>
            </form>
        </div>

        <article class="prose prose-lg prose-indigo text-gray-700">
            {!! $post->body !!}
        </article>
    </div>
</div>
@endsection