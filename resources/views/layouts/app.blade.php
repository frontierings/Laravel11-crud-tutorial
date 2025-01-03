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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')


            <!-- Page Content -->
            <main>
                <div class="flex">
                    <div class="flex-grow p-4">
                        <!-- Page Heading -->
                        <!-- @isset($header)
                            <header class="bg-white shadow">
                                <div class="max-w-7xl mx-auto py-3 text-center">
                                    {{ $header }}
                                </div>
                            </header>
                        @endisset -->

                        {{ $slot }}
                    </div>
                </div>
                <div class="p-10 mt-10 text-center bg-slate-300 text-slate-700">&copy; copy 2025</div>
            </main>
        </div>
    </body>
</html>
