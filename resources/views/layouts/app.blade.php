<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Créer une Catégorie</title>
    @vite('resources/css/app.css')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased dark:bg-gray-900 dark:text-gray-200">
    <header class="bg-white flex items-center h-16 dark:bg-gray-800 shadow-md">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="text-xl font-semibold">
                <span class="hover:text-blue-500"> @yield('name') </span>
            </div>
            <nav class="hidden md:flex space-x-4">
                <a href="/categories" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Catégories</a>
                <a href="/" class="text-gray-600 dark:text-gray-300 hover:text-blue-500">Articles</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto space-y-5 p-5">
        @yield('content')
    </main>
</body>

</html>
