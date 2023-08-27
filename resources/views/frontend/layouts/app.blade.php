<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-frontend.layouts.head title="Home" description="This is the home page for TextAct website" />

<body class="w-100">
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "105558834321190");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Messenger Chat plugin Code End-->


    <!-- Page Heading -->
    @include('frontend.layouts.header')
    @auth
        @if (!auth()->user()->hasVerifiedEmail())
            <div class="alert alert-warning position-absolute w-100 fade show" style="z-index: 10;!important" role="alert">

                <div class="d-flex align-items-center">
                    <div class="mx-auto">
                        <span class="mdi mdi-alert-outline me-2"></span>
                        Please check your email and verify your account!
                        <i class="">Need new email?</i>
                        <form action="{{ route('verification.send') }}" method="post" class="d-inline">
                            @csrf
                            <button class="bg-transparent border-0 text-warning fw-medium"
                                style="text-decoration: underline;">Resend verification</button>
                        </form>
                    </div>
                    <div class="">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
    @endauth
    @include('frontend.layouts.sidebar')


    {{-- Chat bot --}}
    <aside
        style="z-index: 50; top:50%; right:0;transform: translateY(-50%);border-radius: 0.5rem 0 0 0.5rem;max-width:max-content;"
        class="w-100 d-flex flex-column shadow bg-light border border-primary position-fixed">
        <a href="mailto:someone@example.com" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-email"></span>
        </a>
        <a href="tel:555-555-5555" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
            <span class="mdi mdi-phone"></span>
        </a>
        <a href="https://wa.me/+8801885518864/?text=Hi Sam, Whatsup" class="d-inline-block px-2 pb-1"
            style="cursor: pointer;">
            <span class="mdi mdi-whatsapp"></span>
        </a>
    </aside>


    
    <!-- Page Content -->
    <main class="">
        @yield('main')
    </main>


    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')

</body>



</html>
