@php
    $categories = App\Models\ServiceCategory::with(['serviceSubCategories'])->get();
    $isPageV2 = str(url()->current())->contains('page');
@endphp
<header class="d-flex flex-column justify-items-center">
    <div class="d-flex align-items-center flex-grow-1 space-between">
        {{-- app logo and menu btn --}}
        <div class="d-flex align-items-center">
            <div>
                <button id="sidebar-1" class="menu-btn waves-effect waves-light p-2 border-0 mx-2"
                    style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
            <img class="app-logo" style="width:100px;" src="{{ asset('frontend/assets/images/logo/app.png') }}" alt="Text Act Logo">
        </div>

        @if (!$isPageV2)
        {{-- nav for large devices --}}
        <nav class="mx-auto menu laptop">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{request()->routeIs('home') ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger ">
                    <a class="nav-link text-light" href="#">Return Status</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Income Tax Return Verification</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Tax Verification</a></li>
                    </ul>
                </li>
                {{-- Services Caegories --}}
                @foreach ($categories as $category)
                <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs('service.category', $category->id) ? "active-link" : "" }}">
                    <a class="nav-link text-light " href="{{route('service.category', $category->id)}}">{{$category->name}}</a>
                    <ul class="position-absolute dropdown ">
                        @foreach ($category->serviceSubCategories as $sub)
                        <li class="nav-item custom-nav-item dropdown-item {{request()->routeIs("service.sub", $sub->id) ? "active-link" : "" }}">
                            <a href="" class="nav-link text-light">{{$sub->name}}</a>
                        </li>
                        @endforeach
                    </ul>

                </li>
                @endforeach
                <li class="nav-item custom-nav-item {{request()->routeIs("page.industries") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{ route('page.industries') }}">Account & Audit</a>
                </li>
                
                <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs("page.training") ? "active-link" : "" }}">
                    <a class="nav-link text-light" href="{{route('page.training')}}">Training/Education</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Practical Income Tax Course</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">ITP Exam Preparation</a></li>
                    </ul>

                </li>
                <li class="nav-item custom-nav-item {{request()->routeIs("books.view") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                </li>
            </ul>
        </nav>

        {{-- nav for medium devices --}}
        <nav class="mx-auto menu tablet">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{request()->routeIs("home") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="/">Home</a>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="#">Return Status</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Income Tax Return Verification</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a target="_blank" rel="noopener noreferrer" href="#" class="nav-link text-light">Tax Verification</a></li>
                    </ul>
                </li>
                
                <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs("service.*") ? "active-link" : "" }}">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute dropdown">
                        @foreach ($categories as $category)
                        <li class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{request()->routeIs('service.category', $category->id) ? "active-link" : "" }}">
                            <a class="nav-link text-light" href="{{route('service.category', $category->id)}}">{{$category->name}}</a>
                            <ul class="position-absolute nested-dropdown ">
                               @foreach ($category->serviceSubCategories as $sub)
                               <li class="nav-item custom-nav-item dropdown-item {{request()->routeIs("service.sub", $sub->id) ? "active-link" : "" }}">
                                    <a href="" class="nav-link text-light">{{$sub->name}}</a>
                                </li>
                               @endforeach
                            </ul>
                        </li>
                        @endforeach
                        
                    </ul>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs("page.training") ? "active-link" : "" }}">
                    <a class="nav-link text-light" href="{{route('page.training')}}">Training/Education</a>
                    <ul class="position-absolute dropdown ">
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Practical Income Tax Course</a></li>
                        <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">ITP Exam Preparation</a></li>
                    </ul>
                </li>

                <li class="nav-item custom-nav-item {{request()->routeIs("books.view") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{route('books.view')}}">Book Store</a>
                </li>
            </ul>
        </nav>

        @else
        {{-- nav for large devices --}}
        
        <nav class="mx-auto menu d-none d-sm-inline-block">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{request()->routeIs("page.industries") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{route('page.industries')}}">Industries</a>
                </li>
                {{-- Services Caegories --}}
                <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs("service.*") ? "active-link" : "" }}">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute dropdown">
                        @foreach ($categories as $category)
                        <li class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{request()->routeIs('service.category', $category->id) ? "active-link" : "" }}">
                            <a class="nav-link text-light" href="{{route('service.category', $category->id)}}">{{$category->name}}</a>
                            <ul class="position-absolute nested-dropdown ">
                               @foreach ($category->serviceSubCategories as $sub)
                               <li class="nav-item custom-nav-item dropdown-item {{request()->routeIs("service.sub", $sub->id) ? "active-link" : "" }}">
                                    <a href="" class="nav-link text-light">{{$sub->name}}</a>
                                </li>
                               @endforeach
                            </ul>
                        </li>
                        @endforeach
                        
                    </ul>
                </li>
                <li class="nav-item custom-nav-item {{request()->routeIs("page.about") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{ route('page.about') }}">About Us</a>
                </li>
                
                <li class="nav-item custom-nav-item {{request()->routeIs("page.client.studio") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{ route('page.client.studio') }}">Client Studio</a>
                </li>
                <li class="nav-item custom-nav-item {{request()->routeIs("page.appointment") ? "active-link" : "" }}">
                    <a class=" nav-link text-light" href="{{ route('page.appointment') }}">Appointment</a>
                </li>
            </ul>
        </nav>

        @endif

        {{-- btns --}}
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

    @if (!$isPageV2)
    {{-- nav for smaller devices --}}
    <nav class="mx-auto menu mobile">
        <ul class="nav justify-content-center">
            <li class="nav-item custom-nav-item {{request()->routeIs('home') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{route('home')}}">Home</a>
            </li>
            
            
            <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs('service.*') ? "active-link" : "" }}">
                <a class="nav-link text-light" href="#">Services</a>
                <ul class="position-absolute dropdown">
                    @foreach ($categories as $category)
                    <li class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{request()->routeIs('service.category', $category->id) ? "active-link" : "" }}">
                        <a class="nav-link text-light" href="{{route('service.category', $category->id)}}">{{$category->name}}</a>
                        <ul class="position-absolute nested-dropdown ">
                        @foreach ($category->serviceSubCategories as $sub)
                        <li class="nav-item custom-nav-item dropdown-item {{request()->routeIs("service.sub", $sub->id) ? "active-link" : "" }}">
                                <a href="" class="nav-link text-light">{{$sub->name}}</a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs('page.training') ? "active-link" : "" }}">
                <a class="nav-link text-light" href="{{route('page.training')}}">Training/Education</a>
                <ul class="position-absolute dropdown ">
                    <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">Practical Income Tax Course</a></li>
                    <li class="nav-item custom-nav-item dropdown-item"><a href="" class="nav-link text-light">ITP Exam Preparation</a></li>
                </ul>
            </li>

            <li class="nav-item custom-nav-item {{request()->routeIs('books.view') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{route('books.view')}}">Book Store</a>
            </li>
        </ul>
    </nav>

    @else

    {{-- nav for smaller devices --}}
    <nav class="mx-auto menu mobile">
        <ul class="nav justify-content-center">
            <li class="nav-item custom-nav-item {{request()->routeIs('page.industries') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{route('page.industries')}}">Industries</a>
            </li>
            {{-- Services Caegories --}}
            <li class="nav-item custom-nav-item position-relative dropdown-trigger {{request()->routeIs('service.*') ? "active-link" : "" }}">
                <a class="nav-link text-light" href="#">Services</a>
                <ul class="position-absolute dropdown">
                    @foreach ($categories as $category)
                    <li class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{request()->routeIs('service.category', $category->id) ? "active-link" : "" }}">
                        <a class="nav-link text-light" href="{{route('service.category', $category->id)}}">{{$category->name}}</a>
                        <ul class="position-absolute nested-dropdown ">
                           @foreach ($category->serviceSubCategories as $sub)
                           <li class="nav-item custom-nav-item dropdown-item {{request()->routeIs("service.sub", $sub->id) ? "active-link" : "" }}">
                                <a href="" class="nav-link text-light">{{$sub->name}}</a>
                            </li>
                           @endforeach
                        </ul>
                    </li>
                    @endforeach
                    
                </ul>
            </li>
            <li class="nav-item custom-nav-item {{request()->routeIs('page.about') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{ route('page.about') }}">About Us</a>
            </li>
            
            <li class="nav-item custom-nav-item {{request()->routeIs('page.client.studio') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{ route('page.client.studio') }}">Client Studio</a>
            </li>
            <li class="nav-item custom-nav-item {{request()->routeIs('page.appointment') ? "active-link" : "" }}">
                <a class=" nav-link text-light" href="{{ route('page.appointment') }}">Appointment</a>
            </li>
        </ul>
    </nav>
    @endif
    
</header>

