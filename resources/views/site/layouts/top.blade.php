<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
        @include('/site/layouts/navigationsite')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-0 px-4 sm:px-0 lg:px-8">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <meta name="csrf-token" content="{{ csrf_token() }}">

                        <title>{{ config('app_site.name', 'CrmCorretor') }}</title>

                        <!-- Fonts -->
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
                        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
                        <!-- Styles -->
                        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

                        <!-- Scripts -->
                        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
                        <script src="{{ asset('js/app.js') }}" defer></script>
                    </head>
                </div>
            </header>
