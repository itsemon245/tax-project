<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data>

<x-frontend.layouts.head description="Fill tax with ease and comfort" :favicon="$settings->basic->favicon" />

<body class="w-100 position-relative" style="overflow: hidden!important;height: 100vh;">
    <style>
        @media (min-width: 992px) {
            #auth-sidebar {
                flex: 0 0 auto;
                width: 22%;
            }

            #auth-sidebar>.sidebar {
                flex: 0 0 auto;
                width: 22%;
            }

            .main {
                flex: 0 0 auto;
                width: 78%;
            }
        }

        @media (min-width: 1300px) {
            #auth-sidebar {
                flex: 0 0 auto;
                width: 18%;
            }

            #auth-sidebar>.sidebar {
                flex: 0 0 auto;
                width: 18%;
            }

            .main {
                flex: 0 0 auto;
                width: 82%;
            }
        }
    </style>
    <x-preloader />
    {{-- Messenger Chat Plugin Code --}}
    <div id="fb-root"></div>

    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "108338047400293");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    {{-- End Messenger --}}


    <!-- Page Heading -->
    @include('frontend.layouts.header')
    @include('frontend.layouts.sidebar')
    @auth
        @if (!auth()->user()->hasVerifiedEmail())
            <div class="alert !rounded-none !py-2 alert-warning position-absolute w-100 fade show" style="z-index: 10;!important" role="alert">

                <div class="d-flex align-items-center">
                    <div class="mx-auto">
                        <div class="flex flex-wrap items-center justify-center">
                            <span class="mdi mdi-alert-outline me-2"></span>
                            Please check your email and verify your account!
                            <form action="{{ route('verification.send') }}" method="post" class="d-inline">
                                <i class="ms-1">Need new email?</i>
                                @csrf
                                <button class="bg-transparent border-0 text-warning fw-medium"
                                    style="text-decoration: underline;">Resend verification email</button>
                            </form>
                        </div>
                        <div class="text-center text-green-500">
                            Please check the spam folder if you didn't receive any email
                        </div>
                    </div>
                    <div class="">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
    @endauth


    @php
        $user = auth()->user();
        $isRead = $user !== null ? count($user?->unreadNotifications) === 0 : true;
        // dd($basic);
    @endphp
    {{-- Chat bot --}}
    <aside
        style="z-index: 50; top:50%; right:0;transform: translateY(-50%);border-radius: 0.5rem 0 0 0.5rem;max-width:max-content;"
        class="w-100 d-flex flex-column shadow bg-light border border-primary position-fixed">
        <a title="Mail Us" href="mailto:{{ $basic->email }}" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-email"></span>
        </a>
        <a title="Call Us" href="tel:{{ $basic->phone }}" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-phone"></span>
        </a>
        <a title="Connect in Whatsapp" href="https://wa.me/{{ $basic->whatsapp }}/?text=Hi Sam, Whatsup"
            class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-whatsapp"></span>
        </a>
    </aside>


    <div class="row">
        <div id="auth-sidebar" class="bg-light d-none d-lg-block col-6 col-sm-4  col-xl-2 ps-4 pe-2 position-relative">
            {{-- Sidebar 2 -> user dashboard navigation --}}
            @auth
                <div class="sidebar sidebar-2 col-6 col-sm-4 col-xl-2 p-0">
                    <ul class="list-unstyled">
                        <li class="p-1">
                            <div class="d-flex justify-content-between align-items-center">
                                <button
                                    class="auth-sidebar-toggle menu-close-btn waves-effect waves-light p-2 me-2 border-0"
                                    style="background: none;">
                                    <span class="mdi mdi-close"></span>
                                </button>
                                <x-application-logo />
                            </div>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('user-profile.create') }}" class="">Profile</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('user-doc.index') }}">My Documents</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('purchase.index') }}">My Purcahses</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('page.my.courses') }}">My Courses</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('page.my.case.studies') }}">My Case Studies</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('referral.index') }}">Referrals</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('notification') }}">Notificaion
                                @if (!$isRead)
                                    <span
                                        class="badge bg-danger px2 py-1 rounded-circle">{{ count($user?->unreadNotifications) }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('page.promo.code') }}">Promo Code</a>

                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('tax.calculator') }}">Tax Calculator</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="" href="{{ route('page.my.payments') }}">Payment History</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="btn btn-success waves-effect waves-light"
                                href="{{ route('user-doc.create') }}">Upload
                                Documents</a>
                        </li>



                        <li class="mt-auto mb-5">
                            <hr class="my-3">
                            @auth
                                <div class="d-flex flex-column justify-items-center gap-2 justify-content-end mb-5">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="auth_id" class="d-none" value="{{ auth()->id() }}">
                                        <x-backend.ui.button class="btn-dark w-100">Log out</x-backend.ui.button>
                                    </form>
                                    @if (auth()->user()->hasRole('user'))
                                        <a class="btn btn-secondary" href="{{ route('page.become.partner') }}">Become a
                                            partner</a>
                                    @endif
                                </div>
                            @endauth
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
        <!-- Page Content -->
        <main class="col-12 {{ auth()->user() !== null ? 'main col-xl-10' : '' }} flex-grow-1 p-0"
            style="height:max-content;">
            <div>
                @yield('main')
                @include('frontend.layouts.footer')
            </div>
        </main>
    </div>


    @include('frontend.layouts.scripts')
    <script>
        $(document).ready(function() {
            $('.auth-sidebar-toggle').click(e => {
                $('#auth-sidebar')
                    .toggleClass('d-none d-lg-block')
                    .toggleClass('d-lg-none')

                $('main')
                    .toggleClass('col-12')
                    .toggleClass('col-6 col-sm-8')

                $('.service-category').children()
                    .toggleClass('col-md-4 col-lg-3 col-sm-6')
                    .toggleClass('col-md-6 col-lg-4 col-sm-6')
            })

            const container = document.querySelector('.media-scroller');
            const next = document.getElementById('next')
            const prev = document.getElementById('prev')
            const scrollElementWidth = parseInt($('.media-elements').css('width').split('px')[0])
            const scrollUnit = scrollElementWidth + 20;
            container.addEventListener('wheel', e => {
                e.preventDefault();
                container.scrollLeft += e.deltaY;
            })

            next.addEventListener('click', () => {
                container.scrollLeft -= scrollUnit;
            })
            prev.addEventListener('click', () => {
                container.scrollLeft += scrollUnit;
            })
        });
    </script>

</body>

</html>
