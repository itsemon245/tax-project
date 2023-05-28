<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-frontend.layouts.head title="Home" description="This is the home page for TextAct website" />

<body class="">
    <!-- Page Heading -->
    @include('frontend.layouts.header')
    @include('frontend.layouts.navbar')


{{-- Chat bot --}}
<div style="z-index: 3;" class=" rounded-4 shadow-lg d-flex flex-column align-items-center w-10 bg-secondary mb-4 position-absolute position-fixed top-50 end-0">
    <div>
        <a href="mailto:someone@example.com" class="p-3" >
            <i class="mdi mdi-email"></i>
        </a>
    </div>
    <div >
        <a href="tel:555-555-5555" class=" p-3" >
            <i class="mdi mdi-phone"></i>
        </a>
    </div>
    <div >
        <a href="whatsapp://send?abid=phonenumber&text=Hello%2C%20World!" class=" p-3" >
            <i class="mdi mdi-whatsapp"></i>
        </a>
    </div>
</div>

    <!-- Page Content -->
    <main class="">
        @yield('main')
    </main>


    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')

</body>



</html>
