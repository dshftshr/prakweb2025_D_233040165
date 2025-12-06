<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Kategori Postingan</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="group block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-50 hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ $category->name }}</h5>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <p class="font-normal text-gray-700 dark:text-gray-400 mt-2">
                        Jelajahi postingan di {{ $category->name }}
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
