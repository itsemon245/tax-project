<!DOCTYPE html>
<html lang="en">

@include('backend.auth.layouts.head')

<body style="background:linear-gradient(35deg, rgb(32, 32, 32) 50%, rgba(56,189,248,1) 100%);">

    {{-- content section start --}}
    @yield('content')
    {{-- yeild section start --}}


    <footer class="footer footer-alt">
        © Copyright {{ Carbon\Carbon::now()->year }} {{ config('app.name') }}. All Rights Reserved.
    </footer>

    @include('backend.auth.layouts.script')

</body>

</html>
