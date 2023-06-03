<header class="d-flex flex-column justify-items-center">
    <div class="d-flex align-items-center flex-grow-1 space-between">
        <div class="d-flex align-items-center">
            <div>
                <button id="sidebar-1" class="menu-btn waves-effect waves-light p-2 border-0 mx-2"
                    style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
            <img class="app-logo" style="width:120px;" src="{{ asset('frontend/assets/images/logo/app.png') }}" alt="Text Act Logo">
        </div>

        {{-- nav for large devices --}}
        <nav class="mx-auto menu laptop">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item active-link">
                    <a class=" nav-link text-light" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Return Status</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Income Tax Return Verification</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Tax Verification</a></li>
                    </ul>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#"> Tax Services</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Income Tax</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Company Account & Audit</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">VAT</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Registration & Licence</a>
                        </li>
                    </ul>

                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">VAT Services</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">VAT Registration</a>
                        </li>
                    </ul>

                </li>
               
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Misc. Services</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">RJSC Company Registration</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Partnership Registration</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Export Registration Certificate</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Import Registration Certificate</a>
                        </li>
                        <li class="nav-item custom-nav-item dropdown-item">
                            <a href="" class="nav-link text-light">Trade Licence</a>
                        </li>
                    </ul>

                </li>
                
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Training/Education</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Practical Income Tax Course</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">ITP Exam Preparation</a></li>
                    </ul>

                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                </li>
            </ul>
        </nav>

        {{-- nav for medium devices --}}
        <nav class="mx-auto menu tablet">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item active-link">
                    <a class=" nav-link text-light" href="/">Home</a>
                </li>
                
                
                <li class="nav-item custom-nav-item position-relative nested-dropdown-trigger">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute nested-dropdown ">
                        <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                            <a class="nav-link text-light" href="#"> Tax Services</a>
                            <ul class="position-absolute dropdown ">
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Income Tax</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Company Account & Audit</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">VAT</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Registration & Licence</a>
                                </li>
                            </ul>
        
                        </li>
                        <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                            <a class="nav-link text-light" href="#">VAT Services</a>
                            <ul class="position-absolute dropdown ">
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">VAT Registration</a>
                                </li>
                            </ul>
        
                        </li>
                       
                        <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                            <a class="nav-link text-light" href="#">Misc. Services</a>
                            <ul class="position-absolute dropdown ">
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">RJSC Company Registration</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Partnership Registration</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Export Registration Certificate</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Import Registration Certificate</a>
                                </li>
                                <li class="nav-item custom-nav-item dropdown-item">
                                    <a href="" class="nav-link text-light">Trade Licence</a>
                                </li>
                            </ul>
        
                        </li>
                    </ul>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Education</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Practical Income Tax Course</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">ITP Exam Preparation</a></li>
                    </ul>
                </li>

                <li class="nav-item custom-nav-item active-link">
                    <a class=" nav-link text-light" href="/">Book Store</a>
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

