<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                background-color: #f0f4f8; /* Fondo claro */
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
            }

            h1 {
                font-size: 3rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 20px;
            }

            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                text-align: center;
                padding: 0 20px;
            }

            nav {
                background-color: #fff;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                box-sizing: border-box; /* Para evitar desbordes de padding */
            }

            a {
                display: inline-block;
                margin: 12px 0;
                padding: 12px 20px;
                text-decoration: none;
                font-weight: 600;
                border-radius: 8px;
                text-align: center;
                transition: background-color 0.3s, color 0.3s;
                width: 100%; /* Asegura que los botones ocupen todo el ancho disponible */
                background-color: #FF2D20;
                color: white;
                box-sizing: border-box; /* Para que el padding no afecte el ancho */
            }

            a:hover {
                background-color: #ff5722;
                color: #fff;
            }

            @media (max-width: 480px) {
                a {
                    width: 100%; /* Los botones se adaptan al 100% del ancho disponible en pantallas pequeñas */
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="container">
            <h1>PRACTICAS FCT</h1>
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </body>
</html>

