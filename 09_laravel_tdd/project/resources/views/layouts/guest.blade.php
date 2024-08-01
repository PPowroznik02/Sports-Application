<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Dodane style CSS */
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #3b82f6; /* Tailwind blue-500 */
            color: #1f2937; /* Tailwind gray-900 */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px; /* Odstępy między obrazami i kontenerem */
        }

        .image-row {
            display: flex;
            justify-content: center;
            gap: 20px; /* Odstępy między obrazami */
            flex-wrap: wrap; /* Pozwala na zawijanie obrazów w rzędzie */
        }

        .image-row img {
            max-width: 150px; /* Ustawia maksymalną szerokość obrazu */
            height: auto; /* Utrzymuje proporcje obrazu */
            margin: 10px; /* Dodaje marginesy wokół obrazów */
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: cornflowerblue;
            width: 1500px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="main-container">
    <div class="image-row">
        <img src="{{ asset('images/bieg_lasjpg.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/hiking.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/kosz.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/morsy.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/rolki_blonia.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/rowery.jpg') }}" alt="description of my image">
    </div>
    <div class="center-content">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <div class="image-row">
        <img src="{{ asset('images/silownia.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/szachy.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/wingsuit.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/wspinaczka.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/hiking.jpg') }}" alt="description of my image">
        <img src="{{ asset('images/rowery.jpg') }}" alt="description of my image">
    </div>
</div>
</body>
</html>
