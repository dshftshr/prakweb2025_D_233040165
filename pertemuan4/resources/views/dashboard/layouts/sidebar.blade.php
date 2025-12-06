<nav class="w-64 bg-white border-r border-gray-200 min-h-screen hidden md:block">
    <div class="pt-6 px-4">
        <ul class="space-y-2">
            <li>
                <a href="/dashboard" class="flex items-center px-4 py-2 text-gray-700 rounded-md hover:bg-gray-100 {{ Request::is('dashboard') ? 'bg-gray-100 font-semibold text-indigo-600' : '' }}">
                    <span data-feather="home" class="w-5 h-5 mr-3"></span>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/dashboard/posts" class="flex items-center px-4 py-2 text-gray-700 rounded-md hover:bg-gray-100 {{ Request::is('dashboard/posts*') ? 'bg-gray-100 font-semibold text-indigo-600' : '' }}">
                    <span data-feather="file-text" class="w-5 h-5 mr-3"></span>
                    Postingan Saya
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="px-4 mt-8 mb-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            Administrator
        </h6>
        <ul class="space-y-2">
            <li>
                <a href="/dashboard/categories" class="flex items-center px-4 py-2 text-gray-700 rounded-md hover:bg-gray-100 {{ Request::is('dashboard/categories*') ? 'bg-gray-100 font-semibold text-indigo-600' : '' }}">
                    <span data-feather="grid" class="w-5 h-5 mr-3"></span>
                    Kategori Post
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>