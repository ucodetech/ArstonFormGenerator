<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="red">
    <meta property="og:title" content="Built By Gtechno">
    <meta property="og:description" content="Design and developed by Gtechno powered by tailwind and flowbite css">

    <title>pdf</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @stack("styles")
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>
    <body class="antialiased text-white dark">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">        

             {{ $slot }}
             
        </div>
        
    @stack("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>
