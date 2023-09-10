@extends('frontend.layouts.app')

@section('main')
    <style>
        /* Range Slider */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
        }

        .range-slider,
        .range-slider>.progress {
            height: 5px;
            border-radius: 5px;
            background-color: #ddd;
        }

        .range-slider {
            background-color: #ddd;
            position: relative;
        }

        .range-slider>.progress {
            background-color: var(--primary);
            position: absolute;
            left: 0%;
            right: 0%;
        }

        .range-slider-input>input {
            position: absolute;
            top: -5px;
            height: 5px;
            width: 100%;
            pointer-events: none;
            background: none;
            -webkit-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            pointer-events: auto;
            -webkit-appearance: none;
            background: var(--primary);
        }

        input[type="range"]::-moz-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            pointer-events: auto;
            -moz-appearance: none;
            background: var(--primary);
        }

        .filter-btn-box {
            display: none;
            padding: 10px;
            background: #F1EBEB;
        }

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
        $testimonials = getRecords('testimonials');
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
                    <div class="filter-menu p-3 shadow bg-light rounded-2 ">
                        <div class="filters">
                            <div class="experience-filter my-2">
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
                            </div>
                            <div class="filter-group my-2" data-group-type="status">
                                <div class="label mb-2">
                                    <span>Categories</span>
                                </div>
                                <div class="items">
                                    @foreach ($exptcategories as $exptcategory)
                                    <label class="filter form-check-label" for="{{ $exptcategory->name}}">
                                        <input type="checkbox" class="form-check-input" name="status" value="{{ $exptcategory->name}}" id="{{ $exptcategory->name}}"/>
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
                                    @foreach ($experts as $expert)
                                    <label class="filter form-check-label" for="{{ $expert->id }}">
                                        <input type="checkbox" class="form-check-input" name="status" value="{{ $expert->id }}" id="{{ $expert->id }}">
                                        <span class="ms-3">{{ $expert->post }}</span>
                                    </label>
                                    <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <span>{{ $expertCategory->name }},  </span>
                                                @endforeach
                                            </h5>
                                            <p class="browse_card_price">Fee: {{$expert->price}}/-</p>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a href="{{ route('expert.profile', $expert->id) }}"
                                            class="btn btn-outline-primary fw-medium">View
                                            Profile</a>
                                        <a href="{{ route('payment.create', ['model' => ExpertProfile::class, 'id' => $expert->id]) }}" class="btn btn-primary fw-medium">
                                            Consultation
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $experts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-frontend.testimonial-section :testimonials="$testimonials">
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

        const rangeSlider = (rangeSliderInputs, rangeInputs, progress, priceGap) => {
            rangeInputs.forEach(input => {
                input.addEventListener("input", e => {
                    let minVal = parseInt(rangeInputs[0].value)
                    let maxVal = parseInt(rangeInputs[1].value)

                    if ((maxVal - minVal >= priceGap) && maxVal <= 100000) {
                        if (e.target.dataset.key === "input-min") {
                            rangeSliderInputs[0].value = minVal
                            progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
                        } else {
                            rangeSliderInputs[1].value = maxVal
                            progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
                        }
                    }

                })
            });

            rangeSliderInputs.forEach(input => {
                input.addEventListener("input", e => {
                    let minVal = parseInt(rangeSliderInputs[0].value)
                    let maxVal = parseInt(rangeSliderInputs[1].value)

                    if (maxVal - minVal < priceGap) {
                        e.target.className === "range-min" ?
                            rangeSliderInputs[0].value = maxVal - priceGap :
                            rangeSliderInputs[1].value = minVal - priceGap
                    } else {
                        rangeInputs[0].value = minVal
                        rangeInputs[1].value = maxVal
                        progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
                        progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
                    }

                })
            });
        }

        const priceRangeSliderInputs = document.querySelectorAll("#price-range-slider-input>input")
        const priceRangeInputs = document.querySelectorAll("#price-range-input input")
        const priceProgress = document.querySelector("#price-range-slider>.progress")
        const pricePriceGap = 1000

        const experienceRangeSliderInputs = document.querySelectorAll("#experience-range-slider-input>input")
        const experienceRangeInputs = document.querySelectorAll("#experience-range-input input")
        const experienceProgress = document.querySelector("#experience-range-slider>.progress")
        const experienceGap = 1

        rangeSlider(priceRangeSliderInputs, priceRangeInputs, priceProgress, pricePriceGap)
        rangeSlider(experienceRangeSliderInputs, experienceRangeInputs, experienceProgress, experienceGap)
    </script>
@endpush
