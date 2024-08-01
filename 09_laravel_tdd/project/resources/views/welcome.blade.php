<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ustawienie przestrzeni między elementami */
            min-height: 100vh; /* Ustawienie minimalnej wysokości na wysokość widoku */
            background: radial-gradient(circle, rgba(33,27,140,1) 4%, rgba(41,64,176,1) 32%, rgba(32,110,193,1) 59%);
            color: #ffffff;
        }

        header {
            background-color: rgba(0, 0, 0, 0); /* Przezroczyste tło nagłówka */
            padding: 10px 0; /* Wewnętrzny odstęp nagłówka */
            text-align: center; /* Wyśrodkowanie tekstu */
        }

        .logo {
            max-width: 200px;
        }

        .content {
            flex: 1; /* Rozciąganie zawartości na całą wysokość dostępną */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .active-space {
            font-size: 8rem;
            font-weight: bolder;
            margin-bottom: 60px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 1);
        }

        .links {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 2rem;

        }

        .links a {
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .links a:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        .footer {
            background-color: #0056b3; /* Kolor tła stopki */
            text-align: center;
            padding: 20px;
            color: #ffffff;
        }
    </style>
</head>
<body>
<header>
    <div class="logo-container">
        <img src="{{ asset('images/run1.jpg') }}" alt="Logo" class="logo">
    </div>
</header>

<div class="content">
    <div class="active-space">
        Active space
    </div>

    <div class="links">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/events') }}">Events</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>

<footer class="footer">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</footer>
</body>
</html>
