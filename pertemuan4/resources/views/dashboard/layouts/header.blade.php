<header class="bg-gray-800 text-white shadow-md w-full z-10">
    <div class="flex items-center justify-between px-6 py-3">
        <a class="text-xl font-bold tracking-tight" href="/">Prakweb</a>
        
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-300">Halo, {{ auth()->user()->name }}</span>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded transition duration-150 ease-in-out flex items-center">
                    Keluar <span data-feather="log-out" class="ml-2 w-4 h-4"></span>
                </button>
            </form>
        </div>
    </div>
</header>