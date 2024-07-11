<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MLP To Do List</title>
        @vite(['resources/js/app.js'])
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="bg-gray-100" style="font-family: Open Sans, sans-serif">
        <section class="max-w-6xl mx-auto mt-4 space-y-6">
            <nav class="md:flex md:justify-between md:items-center">
                <div>
                    <a href="/" class="text-xs font-bold uppercase">
                        <img src="/images/logo.png" alt="MLP Logo" width="165" height="16">
                    </a>
                </div>
            </nav>

            {{ $slot }}

            <footer class="border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
                <div class="mt-10">
                    <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                        Copyright © {{ date("Y") }} All Rights Reserved
                    </div>
                </div>
            </footer>
        </section>
    </body>
</html>
