@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    @php
        $productCat = \App\Models\ProductCategory::where('name', 'Standard Package (tax)')
            ->with(['productSubCategories', 'productSubCategories.products'])
            ->first();

    @endphp
    <section class="mb-5">
        <div class="card-body container-fluid px-5">
            <h2 class="header-title h4 mt-4 text-center">{{ $productCat->name }}</h2>
            <div class=" d-flex justify-content-center">
                <p class="text-justify" style="max-width: 100ch; font-weight:500;">
                    {{ $productCat->description }}</p>
            </div>
            <div class="container d-flex justify-content-center">
                <ul class="nav nav-pills navtab-bg justify-content-center" role="tablist">
                    @foreach ($productCat->productSubCategories as $key => $subCat)
                        <li class="nav-item mb-2 md-mb-0" role="presentation">
                            <a href="#{{ str($subCat->name)->slug() . '-' . $subCat->id }}" data-bs-toggle="tab"
                                aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                aria-selected="{{ $key === 0 ? 'true' : 'false' }}" role="tab"
                                class="text-capitalize nav-link {{ $key === 0 ? 'active' : '' }}" tabindex="-1">
                                {{ $subCat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    @foreach ($productCat->productSubCategories as $key => $subCat)
                        <div class="tab-pane {{ $key === 0 ? 'active' : '' }}"
                            id="{{ str($subCat->name)->slug() . '-' . $subCat->id }}" role="tabpanel">
                            <div class="product-wrapper">
                                @foreach ($subCat->products as $product)
                                    <x-frontend.product-card :$product />
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-section.custom-service :customServices="$customServices" />
    <x-frontend.appointment-section :sections="$appointmentSections" />

    <x-frontend.achievements :achievements="$achievements" />


    <x-frontend.info-section :title="$infos1[0]->title" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    {{-- @dd($reviews) --}}
    <section class="mt-5 py-5" style="background: #474646;">
        <h3 class="text-center text-light">Testimonials</h3>

        <div class="swiper !px-12">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper !mb-8">
                <!-- Slides -->
                @forelse ($reviews as $item)
                    <div
                        class="swiper-slide mb-2 bg-white rounded-md shadow-md p-3 w-[220px] sm:w-[300px] md:w-[400px] lg:w-[450px]">
                        <div class="flex items-start gap-3">
                            <img loading="lazy" src="{{ useImage($item->avatar) }}" alt="img" width="48px"
                                height="48px" class=" rounded-circle shadow-4-strong d-block">
                            <div class="mb-2">
                                <h5 class="mb-0">{{ $item->name }}</h5>
                                <small>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                @if ($item->rating)
                                    <div class="rating">
                                        @foreach (range(1, 5) as $rating)
                                            @php
                                                $color =
                                                    $rating > $item->rating ? 'var(--bs-gray-200)' : 'var(--bs-yellow)';
                                            @endphp
                                            <span class="fas fa-star" style="color: {{ $color }};"></span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-muted pl-2 text-justify">
                            {{ $item->comment }}
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide text-center text-light px-5">
                        No Reviews available
                    </div>
                @endforelse
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">
            </div>
            <div class="swiper-button-next">
            </div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
    @push('customCss')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <style>
            :root {
                --swiper-navigation-size: 20px;
                --swiper-navigation-top-offset: 40%;
                --swiper-navigation-sides-offset: 20px;
                --swiper-navigation-color: var(--swiper-theme-color);
            }
        </style>
    @endpush

    @push('customJs')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script>
            var swiper = new Swiper(".swiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                freeMode: true,
                grabCursor: true,
                centeredSlides: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    1024: {
                        slidesPerView: 3,
                        centeredSlides: false,
                    },
                },
            });
        </script>
        {{-- <script>
            const container = document.querySelector('.media-scroller');
            const next = document.getElementById('next')
            const prev = document.getElementById('prev')
            const scrollElementWidth = parseInt($('.media').css('width').split('px')[0])
            const scrollUnit = container.innerWidth();
            container.addEventListener('wheel', e => {
                e.preventDefault();
                container.scrollLeft += e.deltaY;
            })

            next.addEventListener('click', () => {
                container.scrollLeft -= scrollUnit;
                console.log(scrollUnit);
            })
            prev.addEventListener('click', () => {
                container.scrollLeft += scrollUnit;
            })
        </script> --}}
    @endpush
@endsection

@pushOnce('customJs')
    <script>
        $(document).ready(function() {
            var counter = 0
            window.onload = () => {
                if (!counter && isScrolledIntoView(document.getElementById("counter-section"))) {
                    counter = 1
                    counterUp()
                }
            }

            window.addEventListener("scroll", () => {
                console.log(counter)
                if (!counter && isScrolledIntoView(document.getElementById("counter-section"))) {
                    counter = 1
                    counterUp()
                }
                // else if (!isScrolledIntoView(document.getElementById("counter-section")) && counter) {
                //     counter = 0
                // }
            })

            function isScrolledIntoView(el) {
                let rect = el.getBoundingClientRect();
                let elemTop = rect.top;
                let elemBottom = rect.bottom;

                let isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
                // let isVisible = elemTop < window.innerHeight && elemBottom >= 0;
                return isVisible;
            }

            function counterUp() {
                $('.counter-up').each(function() {
                    let countTo = $(this).text()
                    $(this).prop('Counter', 0).animate({
                        Counter: countTo
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        },
                        complete: function() {
                            $(this).text($(this).Counter);
                        }
                    });
                });
            }
        });
    </script>
@endPushOnce
