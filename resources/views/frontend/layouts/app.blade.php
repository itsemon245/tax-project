<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-frontend.layouts.head title="Home" description="This is the home page for TextAct website" />

<body class="">
    <!-- Page Heading -->
    @include('frontend.layouts.header')
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
    @include('frontend.layouts.scripts')

</body>



</html>
