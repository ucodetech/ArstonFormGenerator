<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="red">
    <meta property="og:title" content="Built By Gtechno">
    <meta property="og:description" content="Design and developed by Gtechno powered by tailwind and flowbite css">

    <link rel="shortcut icon" href="{{ asset('storage/site_logo/fpinewslinere.png') }}" type="image/x-icon">


    @php
        $title = basename($_SERVER['PHP_SELF'], '.blade.php');
        $title1 = explode('.', $title);
        $title2 = ucfirst($title1[0]);
    @endphp
    <title>{{ $title2 == "Index"? 'Home': $title2 }}-{{ config('app.name', 'News') }}</title>
    @livewireStyles
    @stack("styles")
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
    <body class="antialiased text-white dark">
        <div class="relative sm:flex sm:justify-center min-h-screen  bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white p-0">
            <x-grl.messages/>
            <x-grl.notification/>

             {{ $slot }}
             
        </div>
        
    @livewireScripts
    @stack("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>
