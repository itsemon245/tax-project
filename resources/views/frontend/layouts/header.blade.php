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
        <div class="d-flex align-items-center gap-3 justify-content-end">
            <a class="btn btn-secondary rounded-1 partner-btn-hide" href="">Become a partner</a>
            @auth
                <div class="d-flex align-items-center">
                    <span class="mdi mdi-account-outline text-light" style="font-size: 32px"></span>
                    <span class="mdi mdi-chevron-down text-light" style="font-size: 16px;margin-left:-8px;"></span>
                </div>
            @else
                <a class="btn btn-primary rounded-1" href="{{ route('login') }}">Sign in</a>
            @endauth
        </div>
    </div>
</header>
