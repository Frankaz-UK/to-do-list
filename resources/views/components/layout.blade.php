<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>MLP To Do List</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes
    </head>
    <body class="bg-secondary" style="--bs-bg-opacity: .25;">
        <section class="mx-auto pt-4" style="width: 1200px;" id="app" v-cloak>
            <nav class="row mb-5">
                <div class="col-12">
                    <a href="/" class="text-xs font-bold uppercase">
                        <img src="/images/logo.png" alt="MLP Logo">
                    </a>
                </div>
            </nav>

            {{ $slot }}

            <footer class="mt-5">
                <div class="row text-center">
                    <div class="col-12">
                        Copyright © {{ date("Y") }} All Rights Reserved
                    </div>
                </div>
            </footer>
        </section>
        <script src="{{ mix('build/assets/app.js') }}"></script>
    </body>

</html>
