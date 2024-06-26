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
        <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="pb-8 min-h-screen bg-fondo">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>


        </div>
        @include('layouts.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 2000, // Duración en milisegundos
            });
        </script>
    </body>
</html>
