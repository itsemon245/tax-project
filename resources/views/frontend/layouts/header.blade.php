<header class="d-flex flex-column justify-items-center">
    <div class="d-flex align-items-center flex-grow-1 space-between">
        <div class="d-flex align-items-center">
            <div>
                <button id="sidebar-1" class="menu-btn waves-effect waves-light p-2 border-0 mx-2"
                    style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
            <img style="max-width:200px;" src="{{ asset('frontend/assets/images/logo/app.png') }}" alt="Text Act Logo">
        </div>

        {{-- nav for large devices --}}
        <nav class="mx-auto menu show-laptop">
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
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                    </ul>

                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('training.index') }}">Training</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('misc.service') }}">Misc. Services</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('client.studio') }}">Client Studio</a>
                </li>
            </ul>
        </nav>

        {{-- nav for medium devices --}}
        <nav class="mx-auto menu show-tablet">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item active-link">
                    <a class=" nav-link text-light" href="/">Home</a>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="">Tax Products</a>
                </li>
                <li class="nav-item custom-nav-item  position-relative">
                    <a class=" nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute">
                        <li class="nav-item custom-nav-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                        <li class="nav-item custom-nav-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                        <li class="nav-item custom-nav-item"><a href="" class="nav-link text-light">Audit
                                Service</a></li>
                    </ul>
                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('about') }}">About Us</a>
                </li>
            </ul>
        </nav>
        <div class="">
            <div class="d-flex align-items-center gap-3 justify-content-end">
                <a class="btn btn-secondary rounded-1 partner-btn-hide" href="">Become a partner</a>
                @auth
                    <div id="sidebar-2" class="d-flex align-items-center menu-btn">
                        <span class="mdi mdi-account-outline text-light" style="font-size: 32px"></span>
                        <span class="mdi mdi-chevron-down text-light" style="font-size: 16px;margin-left:-8px;"></span>
                    </div>
                @else
                    <a class="btn btn-primary rounded-1" href="{{ route('login') }}">Sign in</a>
                @endauth
            </div>
        </div>
    </div>
    {{-- nav for smaller devices --}}
    <nav class="mx-auto menu show-mobile">
        <ul class="nav justify-content-center">
            <li class="nav-item custom-nav-item active-link">
                <a class=" nav-link text-light" href="/">Home</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class=" nav-link text-light" href="">Tax Products</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class=" nav-link text-light" href="#">Services</a>
            </li>
            <li class="nav-item custom-nav-item">
                <a class=" nav-link text-light" href="#">JusAuditor</a>
            </li>
        </ul>
    </nav>
</header>


@pushOnce('customJs')
    {{-- <script>
        $(document).ready(function () {
            const trigger = $('.dropdown-trigger')
            const dropdown = $('.dropdown')

            dropdown.hide()


            trigger.on('mouseenter', (e)=>{
                dropdown.slideDown();
            })
            trigger.on('mouseleave', (e)=>{
                setTimeout(() => {
                    dropdown.slideUp();
                }, 200);
            })
        });
    </script> --}}
@endPushOnce
