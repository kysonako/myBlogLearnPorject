<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="min-h-screen flex flex-col">

    <livewire:header.main-header />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <livewire:footer.main-footer class="mt-auto" />  <!-- 👈 КЛЮЧЕВОЙ МОМЕНТ -->

    @livewireScripts
    </body>
</html>
