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
            <div>
                <button class="menu-btn waves-effect waves-light p-2 border-0 mx-2" style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
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
                <a class="btn btn-secondary rounded-1 partner-btn-hide" href="">Become a partner</a>
                @if (Route::has('login'))
                    <a class="btn btn-primary rounded-1" href="{{ route('login') }}">Sign in</a>
                @endif
            </div>
        </div>
    </header>
    <nav class="relative">
        <div class="sidebar">
            <ul class="list-unstyled">
                <li class="p-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="menu-close-btn waves-effect waves-light p-2 me-2 border-0"
                            style="background: none;">
                            <span class="mdi mdi-close"></span>
                        </button>
                        <a href="/">
                            <img style="max-width:120px;" src="{{ asset('frontend/assets/images/logo/app.png') }}"
                                alt="Text Act Logo">
                        </a>
                    </div>
                </li>

                <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="" href="/">Home</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="">Tax Products</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">Return Status</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">Services</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">Training</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">Book Store</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">JusAuditor</a>
                </li>
                <li class="sidebar-item">
                    <a class="" href="#">Misc. Services</a>
                </li>
                <li>
                    <div class="">
                        <hr class="my-3">
                        <div class="d-flex flex-column justify-items-center gap-2 justify-content-end">
                            @if (Route::has('login'))
                                <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
                            @endif
                            <a class="btn btn-secondary" href="">Become a partner</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>



    <!-- Page Content -->
    <main class="">
        @yield('main')
    </main>


    @include('frontend.layouts.footer')
    @stack('customJs')
    {{-- vendor JS  --}}
    <script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
    {{-- app JS  --}}
    <script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>

    <script>
        const navLinks = document.querySelectorAll('.custom-nav-item');
        const activeLink = document.querySelector('.active-link');
        const menuBtn = document.querySelector('.menu-btn');
        const menuCloseBtn = document.querySelector('.menu-close-btn');
        const sidebar = document.querySelector('.sidebar');

        navLinks.forEach(link => {
            link.addEventListener('mouseenter', (e) => {
                activeLink.classList.remove('active-link')
            })
            link.addEventListener('mouseleave', (e) => {
                setTimeout(activeLink.classList.add('active-link'), 400);
            })
        });

        menuBtn.addEventListener('click', e => {
            sidebar.classList.toggle('sidebar-show')
        })
        menuCloseBtn.addEventListener('click', e => {
            sidebar.classList.toggle('sidebar-show')
        })
    </script>

</body>



</html>
