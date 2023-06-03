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
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">Return Status</a>
                    <span class="mdi mdi-chevron-down-box-outline dropdown-click-trigger rounded px-1 bg-light" data-target="#return-status" style="font-size: 20px; color: var(--bs-gray-600); cursor:pointer;"></span>
                </div>
                <ul class="dropdown-click" id="return-status">
                    <li class="sidebar-item ps-3 dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="">Income Tax Return Verification</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="">Tax Verification</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">Tax Services</a>
                    <span class="mdi mdi-chevron-down-box-outline dropdown-click-trigger rounded px-1 bg-light" data-target="#tax-services" style="font-size: 20px; color: var(--bs-gray-600); cursor:pointer;"></span>
                </div>
                <ul class="dropdown-click" id="tax-services">
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Income Tax</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Company & Audit</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">VAT</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Registration & Licence</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">Vat Services</a>
                    <span class="mdi mdi-chevron-down-box-outline dropdown-click-trigger rounded px-1 bg-light" data-target="#vat-services" style="font-size: 20px; color: var(--bs-gray-600); cursor:pointer;"></span>
                </div>
                <ul class="dropdown-click" id="vat-services">
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">VAT Registration</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">Misc. Services</a>
                    <span class="mdi mdi-chevron-down-box-outline dropdown-click-trigger rounded px-1 bg-light" data-target="#misc-services" style="font-size: 20px; color: var(--bs-gray-600); cursor:pointer;"></span>
                </div>
                
                <ul class="dropdown-click" id="misc-services">
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">RJSC Company Registration</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Partnership Registration</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Export Registration Certificate</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Import Registration Certificate</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Trade Licence(CCC)</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">Training/Education</a>
                    <span class="mdi mdi-chevron-down-box-outline dropdown-click-trigger rounded px-1 bg-light" data-target="#training-education" style="font-size: 20px; color: var(--bs-gray-600); cursor:pointer;"></span>
                </div>
                <ul class="dropdown-click" id="training-education">
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">Practical Income Tax Course</a></li>
                    <li class="sidebar-item ps-3 dropdown-item"><a href="">ITP Exam Preparation</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="" href="{{ route('books.view') }}">Book Store</a>
            </li>
            <li class="sidebar-item">
                <a class="" href="{{ route('about') }}">About Us</a>
            </li>
            
            <li class="sidebar-item">
                <a class="" href="{{ route('client.studio') }}">Client Studio</a>
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
    @auth
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
                <a href="{{ route('user-profile.create') }}" class="">Profile</a>
            </li>
            <li class="sidebar-item">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="" href="">My Product</a>
                </div>
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
                <a class="btn btn-success waves-effect waves-light" href="{{ route('user-doc.create') }}">Upload
                    Documents</a>
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
    @endauth
</nav>


@push('customJs')
{{-- for clickable dropdown --}}
    <script>
        $(document).ready(function () {
            const trigger = $('.dropdown-click-trigger')
            trigger.each((i, element)=>{
                const dropdown= $(element.dataset.target)
                dropdown.hide()
                element.addEventListener('click', (e)=>{
                dropdown.slideToggle()
            })
            })
            

        });
    </script>

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
