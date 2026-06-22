<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased flex flex-col min-h-screen">
<!-- ШАПКА -->
<livewire:header.main-header />

<!-- ОСНОВНОЙ КОНТЕНТ -->
<main class="flex-1 bg-gray-700">
    <div class="container mx-auto px-4 py-8 text-green-600">
        {{ $slot }}
    </div>
</main>

<!-- ПОДВАЛ -->
<livewire:footer.main-footer />

@livewireScripts
</body>
</html>
