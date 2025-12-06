<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">{{ $title }}</h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Lihat artikel dan pembaruan terbaru kami.
                </p>
            </div>

            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
                @foreach ($posts as $post)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-xl">
                        <div class="shrink-0">
                            <img class="h-48 w-full object-cover" src="https://picsum.photos/seed/{{ $post->slug }}/800/600" alt="">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    <a href="/categories/{{ $post->category->slug }}" class="hover:underline">
                                        {{ $post->category->name }}
                                    </a>
                                </p>
                                <a href="/posts/{{ $post->slug }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $post->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        {{ Str::limit(strip_tags($post->body), 100) }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="shrink-0">
                                    <a href="/authors/{{ $post->author->username }}">
                                        <span class="sr-only">{{ $post->author->name }}</span>
                                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ $post->author->name }}&background=random" alt="">
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="/authors/{{ $post->author->username }}" class="hover:underline">
                                            {{ $post->author->name }}
                                        </a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                            {{ $post->created_at->diffForHumans() }}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>