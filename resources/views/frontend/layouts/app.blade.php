<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Tax') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- App Css  --}}
    <link href="{{ asset('frontend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    {{-- bootstrap Css  --}}
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    <link href="/node_modules/bootstrap/dist/bootstrap.min.css" rel="stylesheet" type="text/css" id="app-style">
    {{-- icons css  --}}
    <link href="{{ asset('frontend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" id="app-style">
    {{-- Head JS  --}}
    <script src="{{ asset('frontend/assets/js/head.js') }}"></script>
    <script src="{{ asset('frontend/extractColor.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="">
    <!-- Page Heading -->
    <header class="d-flex align-items-center">
        <div class="d-flex align-items-center">
            <i class="mdi mdi-menu p-2 mx-2 menu-btn"></i>
            <img style="max-width:200px;" src="{{ asset('frontend/assets/images/logo/app.png') }}" alt="Text Act Logo">
        </div>
        <nav class="mx-auto menu">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item active-link">
                    <a class=" nav-link text-light" href="/">Home</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="">Tax Products</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">Return Status</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">Services</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">Training</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">Book Store</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">JusAuditor</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="#">Misc. Services</a>
                </li>
            </ul>
        </nav>
        <div class="">
            <div class="d-flex align-items-center gap-2 justify-content-end">
                <a class="btn btn-secondary partner-btn" href="">Become a partner</a>
                @if (Route::has('login'))
                    <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="">
        @yield('main')
    </main>


    <footer></footer>
    @stack('customJs')
    {{-- vendor JS  --}}
    <script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
    {{-- app JS  --}}
    <script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>

    <script>
        const navLinks = document.querySelectorAll('.custom-nav-item');
        const activeLink = document.querySelector('.active-link');

        navLinks.forEach(link => {
            link.addEventListener('mouseenter', (e) => {
                activeLink.classList.remove('active-link')
            })
            link.addEventListener('mouseleave', (e) => {
                setTimeout(activeLink.classList.add('active-link'), 400);
            })
        });
    </script>

</body>



</html>
