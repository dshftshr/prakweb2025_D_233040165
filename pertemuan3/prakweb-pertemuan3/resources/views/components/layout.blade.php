<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <nav>
        <a href="/" class="bg-red-500">HOME</a>
        <a href="/post">POST</a>
        <a href="/about">ABOUT</a>
    </nav>

    <main>  
        {{ $slot }}
    </main>
</body>

</html>
