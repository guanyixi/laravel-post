<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Nunito+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans relative antialiased {{Request::route()->getName()}}">
        <div class="min-h-screen bg-primary-300">

            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="text-center bg-primary-300">
                <div class="px-4 pt-7 pb-3 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="pb-8">
                {{ $slot }}
            </main>
        </div>
        @if(session()->has('message'))
            <div class="absolute bottom-4 right-8 p-4 bg-gray-200 rounded-lg">
                {{ session()->get('message') }}
            </div>
        @endif
    </body>
</html>
