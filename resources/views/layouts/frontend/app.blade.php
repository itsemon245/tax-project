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
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="">
    <!-- Page Heading -->
    <header class="px-5 py-3 row align-items-center">
        <div class="col-lg-2">
            Logo Here
        </div>
        <nav class="col-lg-7">
            <ul class="d-flex gap-3 justify-content-center align-items-center mb-0">
                <li class="">
                    <a href="">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
                <li class="">
                    <a href="#">Navlink</a>
                </li>
            </ul>
        </nav>
        <div class="col-lg-3">
            <div class="d-flex align-items-center gap-2 justify-content-end">
                <a class="btn btn-secondary" href="">Become a partner</a>
                @if (Route::has('login'))
                    <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main>
        @yield('main')
    </main>


    <footer></footer>
</body>

</html>
