@extends('layouts.dashboard')

@section('container')
<div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800">Edit Postingan</h1>
</div>

<div class="max-w-2xl">
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="space-y-6 mb-8">
        @method('put')
        @csrf
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
          <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-500 @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
          @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
          <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-500 @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
          @error('slug')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
          <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" name="category_id">
            @foreach ($categories as $category)
                @if(old('category_id', $post->category_id) == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
          </select>
        </div>
        <div>
          <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Isi Postingan</label>
          @error('body')
            <p class="mb-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
          <trix-editor input="body" class="trix-content rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 min-h-[300px]"></trix-editor>
        </div>
        
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Update Postingan
        </button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection