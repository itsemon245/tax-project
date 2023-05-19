<nav class="relative">
    {{-- Sidebar 1-> page navigation --}}
    <div class="sidebar sidebar-1">
        <ul class="list-unstyled">
            <li class="p-1">
                <div class="d-flex justify-content-between align-items-center">
                    <button id="sidebar-1" class="menu-close-btn waves-effect waves-light p-2 me-2 border-0"
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
                <a class="" href="{{route('books.view')}}">Book Store</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">JusAuditor</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Misc. Services</a>
            </li>
            <li class="mt-auto mb-5">
                <div class="">
                    <hr class="my-3">
                    <div class="d-flex flex-column justify-items-center gap-2 justify-content-end">
                        @auth
                        
                            <a class="btn btn-dark" href="{{ route('logout') }}">Log out</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
                        @endauth
                        <a class="btn btn-secondary" href="">Become a partner</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    {{-- Sidebar 2 -> user dashboard navigation --}}
    <div class="sidebar sidebar-2">
        <ul class="list-unstyled">
            <li class="p-1">
                <div class="d-flex justify-content-between align-items-center">
                    <button id="sidebar-2" class="menu-close-btn waves-effect waves-light p-2 me-2 border-0"
                        style="background: none;">
                        <span class="mdi mdi-close"></span>
                    </button>
                    <a href="/">
                        <img style="max-width:120px;" src="{{ asset('frontend/assets/images/logo/app.png') }}"
                            alt="Text Act Logo">
                    </a>
                </div>
            </li>

            <li class="sidebar-item">
                <a class="" href="">My Product</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">My Taxes</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Document</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Notificaion</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Promo Code</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Live Chat</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Upgrade Product</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="#">Payment History</a>
            </li>
            <li class="sidebar-item">
                <a class="btn btn-success waves-effect waves-light" href="{{ route('user-doc.create') }}">Upload Documents</a>
            </li>
            <li class="mt-auto mb-5">
                <div class="">
                    <hr class="my-3">
                    <div class="d-flex flex-column justify-items-center gap-2 justify-content-end">
                        @auth
                            <a class="btn btn-dark" href="{{ route('logout') }}">Log Out</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Sign in</a>
                        @endauth
                        <a class="btn btn-secondary" href="">Become a partner</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>


@push('customJs')
    <script>
        const navLinks = document.querySelectorAll('.custom-nav-item');
        const activeLink = document.querySelector('.active-link');
        const menuBtn = $('.menu-btn')
        const menuCloseBtn = $('.menu-close-btn')

        console.log(menuCloseBtn);
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', (e) => {
                activeLink.classList.remove('active-link')
            })
            link.addEventListener('mouseleave', (e) => {
                setTimeout(activeLink.classList.add('active-link'), 400);
            })
        });

        $.each(menuBtn, (index, btn) => {
            btn.addEventListener('click', e => {
                const sidebar = $('.' + btn.id)
                toggleSidebar(sidebar)
            })
        });
        $.each(menuCloseBtn, (index, btn) => {
            btn.addEventListener('click', e => {
                const sidebar = $('.' + btn.id)
                toggleSidebar(sidebar)
            })
        });

        function toggleSidebar(sidebar) {
            const transformValue = parseInt(sidebar.css('transform').split(' ')[4])
            if (transformValue === 0) {
                console.log('sidebar hide');
                sidebar.css('transform', `translateX(-${sidebar.css('width')})`)
            } else {
                console.log('sidebar show');
                sidebar.css('transform', `translateX(0px)`)
            }
        }
    </script>
@endpush
