<!DOCTYPE html>
<html lang="en">

@include('backend.auth.layouts.head')

<body class="authentication-bg authentication-bg-pattern">

    {{-- content section start --}}
    @yield('content')
    {{-- yeild section start --}}


    <footer class="footer footer-alt">
        © Copyright 2023 Zbold. All Rights Reserved.
    </footer>

    @include('backend.auth.layouts.script')

</body>

</html>
