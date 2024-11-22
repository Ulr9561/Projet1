<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('name')</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
    @stack('scripts')
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

            @if(Auth::user())
                <a href="{{ route('user.logout')}}" class="text-gray-600 dark:text-gray-300 flex justify-end hover:text-blue-500">Logout</a>
            @endif
        </div>
    </header>
    <main class="container mx-auto space-y-5 p-5">
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error !</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success !</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
