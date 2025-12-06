<!doctype html>
<html lang="en" class="h-full bg-gray-50">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prakweb | {{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  </head>
  <body class="h-full font-sans antialiased text-gray-900">

    @include('partials.navbar') 

    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('container')
    </main>

  </body>
</html>