<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')

        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

<!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url(mix('css/main.css')) }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ url(mix('js/app.js')) }}" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">

    <div class="flex items-center justify-center">
        <div class="flex flex-col justify-around">
            <div class="space-y-6">
                <a href="{{ route('home') }}">
                    <x-logo class="w-auto h-16 mx-auto text-indigo-600" />
                </a>

                <h1 class="text-5xl font-extrabold tracking-wider text-center text-gray-600">
                    {{ config('app.name') }}
                </h1>

                <ul class="list-reset">
                    <li class="inline px-4">
                        <a href="https://tailwindcss.com" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Tailwind CSS</a>
                    </li>
                    <li class="inline px-4">
                        <a href="https://github.com/alpinejs/alpine" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Alpine.js</a>
                    </li>
                    <li class="inline px-4">
                        <a href="https://laravel.com" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Laravel</a>
                    </li>
                    <li class="inline px-4">
                        <a href="https://laravel-livewire.com" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">Livewire</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@isset($slot)
    {{ $slot }}
@endisset
@livewireScripts
</body>
</html>
