<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }}">
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <h1>Riempi il form</h1>

        {{count($errors) > 0 ? $errors : '' }}

        <form action="{{ route('product') }}" method="post">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="Nome">
            <label for="descrizione">Descrizione:</label>
            <input type="text" id="descrizione" name="Descrizione">
            <label for="prezzo">Prezzo:</label>
            <input type="number" id="prezzo" step="0.01" name="Prezzo">
            <label for="immagine">Immagine:</label>
            <input type="text" id="immagine" name="Immagine">
            <input type="submit" />
        </form>

    </div>
</body>

</html>
