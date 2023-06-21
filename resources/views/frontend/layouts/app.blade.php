<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-frontend.layouts.head title="Home" description="This is the home page for TextAct website" />

<body class="w-100">
    <!-- Page Heading -->
    @include('frontend.layouts.header')
    @include('frontend.layouts.sidebar')


    {{-- Chat bot --}}
    <aside style="z-index: 50; top:50%; right:0;transform: translateY(-50%);border-radius: 0.5rem 0 0 0.5rem;max-width:max-content;" class="w-100 d-flex flex-column shadow bg-light border border-primary position-fixed">
        <a href="mailto:someone@example.com" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-email"></span>
        </a>
        <a href="tel:555-555-5555" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-phone"></span>
        </a>
        <a href="https://wa.me/+8801885518864/?text=Hi Sam, Whatsup" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-whatsapp"></span>
        </a>
    </aside>


    <aside style="z-index: 50; top:calc(100dvh - 13%); right:5%;transform: translateY(-50%);max-width:max-content;cursor: pointer;" class=" px-3 py-2 rounded-circle shadow bg-primary border border-primary position-fixed">
        <div class="" style="transform:rotateY(180deg)">
            <span style="" class="mdi mdi-chat text-white fs-4"></span>
        </div>
    </aside>

    <!-- Page Content -->
    <main class="">
        @yield('main')
    </main>


    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')

</body>



</html>
