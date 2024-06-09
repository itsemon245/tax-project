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
        <div class="scroll-wrapper">
            <span id="next" class="ti-arrow-circle-left custom-icon"></span>
            <div class="media-scroller snaps-inline">
                @forelse ($reviews as $item)
                    <div class="media-elements">
                        <img loading="lazy" src="{{ useImage($item->avatar) }}" alt="img" width="48px" height="48px"
                            class=" rounded-circle shadow-4-strong d-block">
                        <div>
                            <div class="mb-2">
                                <h5 class="mb-0">{{ $item->name }}</h5>
                                <small>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                                @if ($item->rating)
                                    <div class="rating">
                                        @foreach (range(1, 5) as $rating)
                                            @php
                                                $color = $rating > $item->rating ? 'var(--bs-gray-200)' : 'var(--bs-yellow)';
                                            @endphp
                                            <span class="fas fa-star" style="color: {{ $color }};"></span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <p class="text-muted mb-0">{{ $item->comment }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-light px-5">
                        No Reviews available
                    </div>
                @endforelse
            </div>
            <span id="prev" class="ti-arrow-circle-right custom-icon"></span>
        </div>
    </section>
    
    @push('customCss')
        <style>
            .scroll-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                padding: 10px;
            }
    
    
            @media (min-width: 970px) {
                .scroll-wrapper {
                    padding: 1rem 5rem
                }
            }
    
            @media (min-width: 640px) {
                .scroll-wrapper {
                    gap: 1rem;
                    padding: 2rem;
                }
            }
    
            .media-scroller {
                display: flex;
                overflow-x: auto;
                gap: 1rem;
                overscroll-behavior-inline: contain;
                scroll-behavior: smooth;
            }
    
            .media-elements {
                display: flex;
                align-items: start;
                background: white;
                border-radius: 10px;
                gap: 1rem;
                padding: 1rem;
                max-width: 45ch;
            }
    
            .media-elements .comment {
                width: 100px;
                display: inline;
                margin: 0;
                text-align: justify;
            }
    
            .media-elements .image {
                max-width: 70px;
            }
    
            @media (min-width:600px) {
                .media-elements .image {
                    max-width: 120px;
                }
    
                .media-elements .comment {
                    width: 200px
                }
            }
    
            #next,
            #prev {
                background: none;
                border: none;
                padding: 0;
            }
    
            .custom-icon {
                color: var(--bs-primary);
                font-size: 28px;
                margin: 0 5px;
                cursor: pointer;
            }
    
            .media-scroller::-webkit-scrollbar {
                appearance: none;
                display: none;
            }
    
            .snaps-inline {
                scroll-snap-type: inline mandatory;
                scroll-padding-inline: 5rem;
            }
    
            .snaps-inline>* {
                scroll-snap-align: start;
            }
        </style>
    @endpush
    
    @push('customJs')
        <script>
            const container = document.querySelector('.media-scroller');
            const next = document.getElementById('next')
            const prev = document.getElementById('prev')
            const scrollElementWidth = parseInt($('.media-elements').css('width').split('px')[0])
            const scrollUnit = scrollElementWidth + 20;
            container.addEventListener('wheel', e => {
                e.preventDefault();
                container.scrollLeft += e.deltaY;
            })
    
            next.addEventListener('click', () => {
                container.scrollLeft -= scrollUnit;
            })
            prev.addEventListener('click', () => {
                container.scrollLeft += scrollUnit;
            })
        </script>
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
