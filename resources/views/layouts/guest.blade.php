<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>We Dance</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Voltaire&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Voltaire&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-fondo">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-5 ">

            <div>
                <a href="{{route('/')}}">
                    <img src="{{asset('images/logo.png')}}" class="w-40" alt="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 bg-white py-4 contenedor overflow-hidden">
                {{ $slot }}
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>
