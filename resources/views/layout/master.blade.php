<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    @include('components.navbar')

    <header class="bg-white shadow mt-4">
        <div class="container mx-auto p-6">
            <h1 class="text-2xl font-bold text-gray-800">@yield('header-title')</h1>
            <p class="text-gray-600">@yield('header-description')</p>
        </div>
    </header>

    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
