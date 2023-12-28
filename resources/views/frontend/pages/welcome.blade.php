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
    <x-frontend.testimonial-section :$reviews />
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
