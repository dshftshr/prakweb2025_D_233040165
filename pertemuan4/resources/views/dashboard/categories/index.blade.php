@extends('layouts.dashboard')

@section('container')
<div class="flex justify-between items-center pb-4 mb-4 border-b border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800">Kategori Postingan</h1>
</div>

@if(session()->has('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 max-w-2xl" role="alert">
  <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

<div class="overflow-x-auto max-w-2xl">
    <a href="/dashboard/categories/create" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mb-4 transition duration-150 ease-in-out">
        Buat Kategori Baru
    </a>
    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Kategori</th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach ($categories as $category)
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-yellow-700 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                <span data-feather="edit" class="w-4 h-4"></span>
            </a>
            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="inline-block">
              @method('delete')
              @csrf
              <button class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Apakah anda yakin?')">
                  <span data-feather="x-circle" class="w-4 h-4"></span>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection