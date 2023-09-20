@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    @php
        $productCat = \App\Models\ProductCategory::where('name', 'Standard Package (tax)')
            ->with(['productSubCategories', 'productSubCategories.products'])
            ->first();
        $reviews = \App\Models\Review::with('user')->latest()->limit(10)->get();
    @endphp
    <section class="mb-5">
        <div class="card-body container-fluid px-5">
            <h2 class="header-title h4 mt-4 text-center">{{ $productCat->name }}</h2>
            <div class=" d-flex justify-content-center">
                <p class="text-justify" style="max-width: 100ch; font-weight:500;">
                    {{ $productCat->description }}</p>
            </div>
            <div class="container d-flex justify-content-center">
                <ul class="nav nav-pills navtab-bg" role="tablist">
                    @foreach ($productCat->productSubCategories as $key => $subCat)
                        <li class="nav-item" role="presentation">
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


    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{ $subCategories[0]->serviceCategory->name }}
        </h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($subCategories as $sub)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="d-flex flex-column align-items-center border rounded shadow p-2">
                        <a href="{{ route('service.sub', $sub->id) }}">
                            <img loading="lazy" style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                                src="{{ useImage($sub->image) }}" alt="">
                        </a>
                        <a class="text-dark text-capitalize" href="{{ route('service.sub', $sub->id) }}">
                            <h6>{{ $sub->name }}</h6>
                        </a>
                        <a href="{{ route('service.sub', $sub->id) }}"
                            class="text-center text-muted">{{ $sub->description }}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <x-frontend.appointment-section :sections="$appointmentSections" />

    <section id="counter-section" class="px-lg-5 px-2 my-5">
        <h4 class="text-center mb-5 fs-3">Our Achievments</h4>
        <div class="row justify-content-center px-2">
            @foreach ($achievements as $item)
                <div class="col-sm-6 col-md-4 col-xl-3 col-xxl-2 mb-2">
                    <div class="card rounded-2">
                        <div class="card-body p-2">
                            <div class="d-flex gap-3 align-items-center">
                                <img loading="lazy" class="rounded rounded-2" style="width:80px;height:80px;"
                                    src="{{ useImage($item->image) }}" alt="">
                                <div class="d-flex flex-column justify-content-starr align-items-start">
                                    <h2 class="counter-up m-0 text-primary" style="font-size: 32px; font-weight: 700;">
                                        {{ $item->count }}</h2>
                                    <p class="m-0 fw-medium mt-2">{{ $item->title }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


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
    <x-frontend.testimonial-section :testimonials="$reviews">
    </x-frontend.testimonial-section>
@endsection

@pushOnce('customJs')
    <script>
        $(document).ready(function() {
            const submit = () => {
                $.ajax({
                    type: "post",
                    url: "{{ route('review.store', 'book') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                    success: function(response) {
                        console.log(response);
                    }
                });
            }

            $('#submit-btn').click(submit)
        });
    </script>

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
