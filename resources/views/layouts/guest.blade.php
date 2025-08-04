<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen flex flex-col">
        <div class="flex-1">
            @yield('content')
        </div>
        
        <!-- Footer -->
        @include('components.footer')
    </body>
</html>
