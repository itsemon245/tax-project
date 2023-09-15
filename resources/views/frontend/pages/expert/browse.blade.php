@extends('frontend.layouts.app')

@section('main')
    <style>
        @media (max-width: 992px) {
            .filter-menu {
                width: 50%;
                position: absolute;
                transform: translateX(-1000px);
                z-index: 5;
                transition: all 250ms ease-in-out;
            }
        }
    </style>

    @php
        $banners = getRecords('banners');
        $exptcategories = getRecords('expert_categories');
        // dd($exptcategories);
    @endphp
    <x-frontend.hero-section :banners="$banners" />

    <div id="browse_section">
        <div class="px-lg-5 px-2">
            <div class="d-flex center_sm">
                <h2 class="browse_header">Browse Experts</h2>
                <div class="line">
                    <div class="circle_left"></div>
                    <div class="circle_right"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="filter-menu-btn" data-target="closed" class="btn btn-secondary rounded-1 d-lg-none my-3">
                        <span class="mdi mdi-filter font-14"></span>
                        Filter
                    </button>
                </div>
                <div class="col-lg-3 ">
                    <form action="{{ route('expert.browse') }}" method="get">
                        <div class="filter-menu p-3 shadow bg-light rounded-2 ">
                            <div class="filters">
                                <x-range-slider class="" tooltips="false" name="experience" id="experience"
                                    from="1" to="50" step='1' icon="Yrs"></x-range-slider>
                                {{-- <div class="experience-filter my-2">
                                <div class="label mb-2">
                                    <span>Experience</span>
                                </div>
                                <div class="range-input d-flex w-100 justify-content-between" id="experience-range-input">
                                    <div class="field w-100 d-flex align-items-center">
                                        <span>Min</span>
                                        <input type="number" class="form-control input-min ms-2" data-key="input-min"
                                            value="0">
                                    </div>
                                    <div class="field w-100 d-flex align-items-center ms-1">
                                        <span>Max</span>
                                        <input type="number" class="form-control input-max ms-2" data-key="input-max"
                                            value="25">
                                    </div>
                                </div>
                                <div class="range-slider mt-3" id="experience-range-slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-slider-input position-relative" id="experience-range-slider-input">
                                    <input type="range" name="minexperience" class="range-min" min="0"
                                        max="25" value="0">
                                    <input type="range" name="minexperience" class="range-max" min="0"
                                        max="25" value="25">
                                </div>
                            </div> --}}
                                <div class="card">
                                    <div class="card-header">Categories</div>
                                    <div class="card-body">
                                        @php
                                            $catCollection = collect(request()->query('categories'));
                                        @endphp
                                        @foreach ($exptcategories as $exptcategory)
                                            <label class="filter form-check-label"
                                                for="{{ str($exptcategory->name)->slug() }}">
                                                <input type="checkbox" class="form-check-input" name="categories[]"
                                                    value="{{ $exptcategory->name }}"
                                                    id="{{ str($exptcategory->name)->slug() }}"
                                                    @checked($catCollection->contains(fn($val) => $val === $exptcategory->name)) />
                                                <span class="ms-3">{{ $exptcategory->name }}</span>
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="filter-group my-2" data-group-type="status">
                                    <div class="label mb-2">
                                        <span>Post</span>
                                    </div>
                                    <div class="items">
                                        @php
                                            $postCollection = collect(request()->query('posts'));
                                        @endphp
                                        @foreach ($posts as $post)
                                            <label class="filter form-check-label" for="{{ str($post)->slug() }}">
                                                <input type="checkbox" class="form-check-input" name="posts[]"
                                                    value="{{ $post }}" id="{{ str($post)->slug() }}"
                                                    @checked($postCollection->contains(fn($val) => $val === $post))>
                                                <span class="ms-3">{{ $post }}</span>
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex gap-3 justify-content-center mt-3">
                                    <x-backend.ui.button type="custom" :href="route('expert.browse')"
                                        class="btn-outline-primary mb-0">Clear</x-backend.ui.button>
                                    <x-backend.ui.button class="btn-primary">Apply</x-backend.ui.button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-lg-9">
                    <div class="row mt-0">
                        @foreach ($experts as $expert)
                            <div class="col-12 col-sm-6 col-xxl-4 mb-3">
                                <div class="browse_content_wrapper h-100">
                                    <div class="d-flex gap-3 justify-content-center mb-3">
                                        <div class="d-flex flex-column align-items-center">
                                            <img src="{{ useImage($expert->image) }}" width="64px" height="64px;"
                                                alt="" class="rounded rounded-circle mb-2">
                                            <div class="d-block">
                                                <x-avg-review-stars icon-font="font-14" :avg="$expert->reviews_avg_rating" />
                                            </div>
                                            <div class="text-center">{{ $expert->reviews_avg_rating ?? 0 }} Ratings</div>
                                            <div class="text-center">{{ $expert->reviews_count }} Reviews</div>
                                        </div>
                                        <div class="">
                                            <h2 class="browse_card_name">{{ $expert->name }}</h2>
                                            <span class="badge bg-success p-2">{{ $expert->post }}</span>
                                            <h4 class="browse_card_exp">Experience: {{ $expert->experience }} years</h4>
                                            <h5 class="text-primary fw-medium d-flex ">
                                                @foreach ($expert->expertCategories as $expertCategory)
                                                    <span>{{ $expertCategory->name }}, </span>
                                                @endforeach
                                            </h5>
                                            <p class="browse_card_price">Fee: {{ $expert->price }}/-</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a href="{{ route('expert.profile', $expert->id) }}"
                                            class="btn btn-outline-primary fw-medium">View
                                            Profile</a>
                                        <a href="{{ route('payment.create', ['model' => ExpertProfile::class, 'id' => $expert->id]) }}"
                                            class="btn btn-primary fw-medium">
                                            Consultation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $reviews = \App\Models\Review::with('user')
            ->latest()
            ->limit(10)
            ->get();
        
    @endphp

    <x-frontend.testimonial-section :testimonials="$reviews">
    </x-frontend.testimonial-section>
@endsection

@push('customJs')
    <script>
        $('#filter-menu-btn').click(e => {
            if (e.target.dataset.target === 'closed') {
                e.target.dataset.target = 'opened'
                $('.filter-menu').css('transform', 'translateX(0)');
            } else {
                e.target.dataset.target = 'closed'
                $('.filter-menu').css('transform', 'translateX(-1000px)');
            }
        })

        // const rangeSlider = (rangeSliderInputs, rangeInputs, progress, priceGap) => {
        //     rangeInputs.forEach(input => {
        //         input.addEventListener("input", e => {
        //             let minVal = parseInt(rangeInputs[0].value)
        //             let maxVal = parseInt(rangeInputs[1].value)

        //             if ((maxVal - minVal >= priceGap) && maxVal <= 100000) {
        //                 if (e.target.dataset.key === "input-min") {
        //                     rangeSliderInputs[0].value = minVal
        //                     progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
        //                 } else {
        //                     rangeSliderInputs[1].value = maxVal
        //                     progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
        //                 }
        //             }

        //         })
        //     });

        //     rangeSliderInputs.forEach(input => {
        //         input.addEventListener("input", e => {
        //             let minVal = parseInt(rangeSliderInputs[0].value)
        //             let maxVal = parseInt(rangeSliderInputs[1].value)

        //             if (maxVal - minVal < priceGap) {
        //                 e.target.className === "range-min" ?
        //                     rangeSliderInputs[0].value = maxVal - priceGap :
        //                     rangeSliderInputs[1].value = minVal - priceGap
        //             } else {
        //                 rangeInputs[0].value = minVal
        //                 rangeInputs[1].value = maxVal
        //                 progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
        //                 progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
        //             }

        //         })
        //     });
        // }

        // const priceRangeSliderInputs = document.querySelectorAll("#price-range-slider-input>input")
        // const priceRangeInputs = document.querySelectorAll("#price-range-input input")
        // const priceProgress = document.querySelector("#price-range-slider>.progress")
        // const pricePriceGap = 1000

        // const experienceRangeSliderInputs = document.querySelectorAll("#experience-range-slider-input>input")
        // const experienceRangeInputs = document.querySelectorAll("#experience-range-input input")
        // const experienceProgress = document.querySelector("#experience-range-slider>.progress")
        // const experienceGap = 1

        // rangeSlider(priceRangeSliderInputs, priceRangeInputs, priceProgress, pricePriceGap)
        // rangeSlider(experienceRangeSliderInputs, experienceRangeInputs, experienceProgress, experienceGap)
    </script>
@endpush
