<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Tax') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="">
    <div class="">

        <!-- Page Heading -->
        <header class="">
            <div class="">
                @if (Route::has('login'))
                    <div class="text-muted">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </header>

        <!-- Page Content -->
        <main>
            @yield('main')
        </main>
    </div>
</body>

</html>
