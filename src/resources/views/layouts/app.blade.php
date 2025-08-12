<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([
             'resources/css/app.scss',
             'resources/js/app.js'
         ])
    @endif
</head>
    <body>
    <x-header />
        <main class="container my-4">
            @yield('content')
        </main>
    <x-footer />
    </body>
</html>
