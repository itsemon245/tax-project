@php
    $categories = \App\Models\ServiceCategory::with(['serviceSubCategories'])->get();
    $isPageV2 = str(url()->current())->contains('page');
    $isCoursePage = str(url()->current())->contains('course');
    $settings = \App\Models\Setting::first();
    $basic = $settings->basic;
    $user = \App\Models\User::find(auth()->id());
@endphp
<header id="header" class="d-flex flex-column justify-items-center fixed">
    <div class="d-flex align-items-center flex-grow-1 space-between">
        {{-- app logo and menu btn --}}
        <div class="d-flex align-items-center">
            <div>
                <button title="Navigation" id="sidebar-1" class="menu-btn waves-effect waves-light p-2 border-0 mx-2"
                    style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
            <div>
                <button title="Navigation" id="sidebar-2" class="user-menu-btn waves-effect waves-light p-2 border-0 mx-2"
                    style="background: none;">
                    <i class="mdi mdi-menu text-light"></i>
                </button>
            </div>
            <a href="{{ route('home') }}">
                <img loading="lazy" class="app-logo" style="max-width:120px; object-fit:cover;"
                    src="{{ useImage($basic->logo) }}" alt="Text Act Logo">
            </a>
        </div>

        @if (!$isPageV2 && !$isCoursePage)
            {{-- nav for large devices --}}
            <nav class="mx-auto menu laptop">
                <ul class="nav justify-content-center">
                    <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item custom-nav-item position-relative dropdown-trigger ">
                        <a class="nav-link text-light" href="#">Return Status</a>
                        <ul class="position-absolute dropdown">
                            @php
                                $returnLinks = \App\Models\Setting::first(['return_links'])->return_links;
                            @endphp
                            @foreach ($returnLinks as $link)
                                <li class="nav-item custom-nav-item dropdown-item"><a target="_blank"
                                        rel="noopener noreferrer" href="{{ $link->link }}"
                                        class="nav-link text-light">{{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- Services Caegories --}}
                    @foreach ($categories as $category)
                        <li
                            class="nav-item custom-nav-item position-relative dropdown-trigger {{ url()->current() == url("/service/category/$category->id") ? 'active-link' : '' }}">
                            <a class="nav-link text-light "
                                href="{{ route('service.category', $category->id) }}">{{ $category->name }}</a>
                            <ul class="position-absolute dropdown ">
                                @foreach ($category->serviceSubCategories as $sub)
                                    <li
                                        class="nav-item custom-nav-item dropdown-item {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }}">
                                        <a href="{{ route('service.sub', $sub->id) }}"
                                            class="nav-link text-light">{{ $sub->name }}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </li>
                    @endforeach
                    <li
                        class="nav-item custom-nav-item {{ request()->routeIs('page.industries') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('page.industries') }}">Account & Audit</a>
                    </li>

                    <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                        <a class="nav-link text-light" href="{{ route('course.index') }}">Training/Education</a>
                        <ul class="position-absolute dropdown ">
                            @php
                                $courses = \App\Models\Course::get(['id', 'name']);
                            @endphp
                            @foreach ($courses as $course)
                                <li class="nav-item custom-nav-item dropdown-item"><a
                                        href="{{ route('course.show', $course->id) }}"
                                        class="nav-link text-light">{{ $course->name }}</a></li>
                            @endforeach
                        </ul>

                    </li>
                    <li class="nav-item custom-nav-item {{ request()->routeIs('books.view') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                    </li>
                </ul>
            </nav>

            {{-- nav for medium devices --}}
            <nav class="mx-auto menu tablet">
                <ul class="nav justify-content-center">
                    <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="/">Home</a>
                    </li>
                    <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                        <a class="nav-link text-light" href="#">Return Status</a>
                        <ul class="position-absolute dropdown ">
                            @php
                                $returnLinks = \App\Models\Setting::first(['return_links'])->return_links;
                            @endphp
                            @foreach ($returnLinks as $link)
                                <li class="nav-item custom-nav-item dropdown-item"><a target="_blank"
                                        rel="noopener noreferrer" href="{{ $link->link }}"
                                        class="nav-link text-light">{{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li
                        class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('service.*') ? 'active-link' : '' }}">
                        <a class="nav-link text-light" href="#">Services</a>
                        <ul class="position-absolute dropdown">
                            @foreach ($categories as $category)
                                <li
                                    class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{ url()->current() == url("/service/category/$category->id") ? 'active-link' : '' }}
                            @foreach ($category->serviceSubCategories as $sub)
                                {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }} @endforeach ">
                                    <a class="nav-link text-light"
                                        href="{{ route('service.category', $category->id) }}">{{ $category->name }}</a>
                                    <ul class="position-absolute nested-dropdown ">
                                        @foreach ($category->serviceSubCategories as $sub)
                                            <li
                                                class="nav-item custom-nav-item dropdown-item {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }}">
                                                <a href="{{ route('service.sub', $sub->id) }}"
                                                    class="nav-link text-light">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li
                        class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('course.index') ? 'active-link' : '' }}">
                        <a class="nav-link text-light" href="{{ route('course.index') }}">Training/Education</a>
                        <ul class="position-absolute dropdown ">
                            @foreach ($courses as $course)
                                <li class="nav-item custom-nav-item dropdown-item"><a
                                        href="{{ route('course.show', $course->id) }}"
                                        class="nav-link text-light">{{ $course->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item custom-nav-item {{ request()->routeIs('books.view') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                    </li>
                </ul>
            </nav>
        @elseif ($isCoursePage)
            <nav class="mx-auto menu d-none d-sm-inline-block">
                <ul class="nav justify-content-center">
                    <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                    </li>
                    <li
                        class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('course.index') ? 'active-link' : '' }}">
                        <a class="nav-link text-light" href="{{ route('course.index') }}">Courses</a>
                        <ul class="position-absolute dropdown ">
                            <li class="nav-item custom-nav-item dropdown-item"><a href="{{ route('course.show', 1) }}"
                                    class="nav-link text-light">Practical Income
                                    Tax Course</a></li>
                        </ul>

                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class=" nav-link text-light" href="{{ route('course.caseStudy.page') }}">Case Study
                            Lab</a>
                    </li>

                    <li class="nav-item custom-nav-item {{ request()->routeIs('books.view') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                    </li>

                </ul>
            </nav>
        @else
            {{-- nav for large devices --}}
            <nav class="mx-auto menu d-none d-sm-inline-block">
                <ul class="nav justify-content-center">
                    <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                    </li>
                    <li
                        class="nav-item custom-nav-item {{ request()->routeIs('page.industries') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('page.industries') }}">Industries</a>
                    </li>
                    {{-- Services Caegories --}}
                    <li
                        class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('service.*') ? 'active-link' : '' }}">
                        <a class="nav-link text-light" href="#">Services</a>
                        <ul class="position-absolute dropdown">
                            @foreach ($categories as $category)
                                <li
                                    class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{ url()->current() == url("/service/category/$category->id") ? 'active-link' : '' }}
                            @foreach ($category->serviceSubCategories as $sub)
                                {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }} @endforeach ">
                                    <a class="nav-link text-light"
                                        href="{{ route('service.category', $category->id) }}">{{ $category->name }}</a>
                                    <ul class="position-absolute nested-dropdown ">
                                        @foreach ($category->serviceSubCategories as $sub)
                                            <li
                                                class="nav-item custom-nav-item dropdown-item {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }}">
                                                <a href="{{ route('service.sub', $sub->id) }}"
                                                    class="nav-link text-light">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li class="nav-item custom-nav-item {{ request()->routeIs('page.about') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('page.about') }}">About Us</a>
                    </li>

                    <li
                        class="nav-item custom-nav-item {{ request()->routeIs('page.client.studio') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('page.client.studio') }}">Client Studio</a>
                    </li>
                    <li
                        class="nav-item custom-nav-item {{ request()->routeIs('appointment.make') ? 'active-link' : '' }}">
                        <a class=" nav-link text-light" href="{{ route('appointment.make') }}">Appointment</a>
                    </li>

                </ul>
            </nav>

        @endif

        {{-- btns --}}
        <div class="">
            <div class="d-flex align-items-center gap-3 justify-content-end">
                @auth
                    @can('visit admin panel')
                        <a title="Go to Panel" class="btn btn-secondary d-flex gap-2 align-items-center"
                            href="{{ route('dashboard') }}"><span class="mdi mdi-application-cog font-16"></span>Panel</a>
                    @else
                        @if (
                            !auth()->user()
                                ?->hasRole('partner'))
                            <a class="btn btn-secondary rounded-1 partner-btn-hide"
                                href="{{ route('page.become.partner') }}">Become a partner</a>
                        @else
                            <span class="fw-bold text-warning">You are a partner</span>
                        @endif
                    @endcan

                    <div class="auth-sidebar-toggle d-flex align-items-center menu-btn" title="User Menu" role="button">
                        <span class="mdi mdi-account-outline text-light" style="font-size: 32px"></span>
                        <span class="mdi mdi-chevron-down text-light" style="font-size: 16px;margin-left:-8px;"></span>
                    </div>
                @else
                    <a class="btn btn-primary rounded-1" href="{{ route('login') }}">Sign in</a>
                @endauth
            </div>
        </div>
    </div>

    @if (!$isPageV2 && !$isCoursePage)
        {{-- nav for smaller devices --}}
        <nav class="mx-auto menu mobile">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                </li>


                <li
                    class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('service.*') ? 'active-link' : '' }}">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute dropdown">
                        @foreach ($categories as $category)
                            <li
                                class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{ url()->current() == url("/service/category/$category->id") ? 'active-link' : '' }}
                        @foreach ($category->serviceSubCategories as $sub)
                            {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }} @endforeach ">
                                <a class="nav-link text-light"
                                    href="{{ route('service.category', $category->id) }}">{{ $category->name }}</a>
                                <ul class="position-absolute nested-dropdown ">
                                    @foreach ($category->serviceSubCategories as $sub)
                                        <li
                                            class="nav-item custom-nav-item dropdown-item {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }}">
                                            <a href="{{ route('service.sub', $sub->id) }}"
                                                class="nav-link text-light">{{ $sub->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li class="nav-item custom-nav-item position-relative dropdown-trigger">
                    <a class="nav-link text-light" href="{{ route('course.index') }}">Training/Education</a>
                    <ul class="position-absolute dropdown ">
                        @foreach ($courses as $course)
                            <li class="nav-item custom-nav-item dropdown-item"><a
                                    href="{{ route('course.show', $course->id) }}"
                                    class="nav-link text-light">{{ $course->name }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item custom-nav-item {{ request()->routeIs('books.view') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                </li>
            </ul>
        </nav>
    @elseif ($isCoursePage)
        <nav class="mx-auto menu mobile">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                </li>
                <li
                    class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('course.index') ? 'active-link' : '' }}">
                    <a class="nav-link text-light" href="{{ route('course.index') }}">Courses</a>
                    <ul class="position-absolute dropdown ">
                        @foreach ($courses as $course)
                            <li class="nav-item custom-nav-item dropdown-item"><a
                                    href="{{ route('course.show', $course->id) }}"
                                    class="nav-link text-light">{{ $course->name }}</a></li>
                        @endforeach
                    </ul>

                </li>
                <li class="nav-item custom-nav-item">
                    <a class=" nav-link text-light" href="{{ route('course.caseStudy.page') }}">Case Study
                        Lab</a>
                </li>

                <li class="nav-item custom-nav-item {{ request()->routeIs('books.view') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('books.view') }}">Book Store</a>
                </li>

            </ul>
        </nav>
    @else
        {{-- nav for smaller devices --}}
        <nav class="mx-auto menu mobile">
            <ul class="nav justify-content-center">
                <li class="nav-item custom-nav-item {{ request()->routeIs('home') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item custom-nav-item {{ request()->routeIs('page.industries') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('page.industries') }}">Industries</a>
                </li>
                {{-- Services Caegories --}}
                <li
                    class="nav-item custom-nav-item position-relative dropdown-trigger {{ request()->routeIs('service.*') ? 'active-link' : '' }}">
                    <a class="nav-link text-light" href="#">Services</a>
                    <ul class="position-absolute dropdown">
                        @foreach ($categories as $category)
                            <li
                                class="nav-item custom-nav-item position-relative dropdown-item nested-dropdown-trigger {{ url()->current() == url("/service/category/$category->id") ? 'active-link' : '' }}
                        @foreach ($category->serviceSubCategories as $sub)
                            {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }} @endforeach ">
                                <a class="nav-link text-light"
                                    href="{{ route('service.category', $category->id) }}">{{ $category->name }}</a>
                                <ul class="position-absolute nested-dropdown ">
                                    @foreach ($category->serviceSubCategories as $sub)
                                        <li
                                            class="nav-item custom-nav-item dropdown-item {{ url()->current() == url("/service/sub/$sub->id") ? 'active-link' : '' }}">
                                            <a href="{{ route('service.sub', $sub->id) }}"
                                                class="nav-link text-light">{{ $sub->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li class="nav-item custom-nav-item {{ request()->routeIs('page.about') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('page.about') }}">About Us</a>
                </li>

                <li
                    class="nav-item custom-nav-item {{ request()->routeIs('page.client.studio') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('page.client.studio') }}">Client Studio</a>
                </li>
                <li
                    class="nav-item custom-nav-item {{ request()->routeIs('appointment.make') ? 'active-link' : '' }}">
                    <a class=" nav-link text-light" href="{{ route('appointment.make') }}">Appointment</a>
                </li>
            </ul>
        </nav>
    @endif

</header>
<div id="header-filler">

</div>

@pushOnce('customJs')
    <script>
        $(document).ready(function() {
            let headerHeight = $('#header').css('height')
            $('#header-filler').css({
                'height': headerHeight
            })
        });
    </script>
@endPushOnce
