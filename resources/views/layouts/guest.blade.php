<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="flex items-center gap-20 px-4 sm:px-20 py-4">
                <a href="/">
                    <img src="{{ asset('image/avs-logo.webp') }}" alt="Logo" class="w-28">
                </a>

                @if(App::getLocale() == 'fr')
                    <a class="flex items-center gap-2" href="{{ route('language.change', 'en') }}">
                    <img src="{{ asset('image/royaume-uni.png') }}">{{ 'Anglais' }}</a>
                @else
                    <a class="flex items-center gap-2" href="{{ route('language.change', 'fr') }}">
                    <img src="{{ asset('image/france.png') }}">{{ 'French' }}</a>
                @endif
            </div>


            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
