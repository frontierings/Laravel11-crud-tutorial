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
                    <div class="w-44">
                        <ul>
                            <li><a href="{{route('product.index')}}" class="block p-5 font-bold bg-slate-200">Products</a></li>
                            <li><a href="#" class="block p-5 font-bold bg-slate-200">Users</a></li>
                            <li><a href="#" class="block p-5 font-bold bg-slate-200">Setting</a></li>
                            <li class="p-5 bg-slate-200">
                                <a href="lang/fa" class="inline-block px-2 py-1 m-1 bg-white border-b-4 border-orange-500 hover:bg-orange-50 hover:text-orange-500 transition-all">Da</a>
                                <a href="lang/ps" class="inline-block px-2 py-1 m-1 bg-white border-b-4 border-orange-500 hover:bg-orange-50 hover:text-orange-500 transition-all">Ps</a>
                                <a href="lang/en" class="inline-block px-2 py-1 m-1 bg-white border-b-4 border-orange-500 hover:bg-orange-50 hover:text-orange-500 transition-all">En</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-grow">
                        <!-- Page Heading -->
                        @isset($header)
                            <header class="bg-white shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endisset

                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
