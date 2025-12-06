@extends('layouts.dashboard')

@section('container')
<div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800">Edit Kategori</h1>
</div>

<div class="max-w-xl">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}" class="space-y-6 mb-8">
        @method('put')
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
          <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror" id="name" name="name" required autofocus value="{{ old('name', $category->name) }}">
          @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
          <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('slug') border-red-500 @enderror" id="slug" name="slug" required value="{{ old('slug', $category->slug) }}">
          @error('slug')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Update Kategori
        </button>
    </form>
</div>

<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/categories/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection