@extends('frontend.layouts.app')

@section('main')
    @php
        $banners = getRecords('banners');
        $testimonials = getRecords('testimonials');
    @endphp
    <x-frontend.hero-section :banners="$banners" />

    <div id="browse_section">
        <div class="container">
            <div class="d-flex center_sm">
                <h2 class="browse_header">Browse Experts</h2>
                <div class="line">
                    <div class="circle_left"></div>
                    <div class="circle_right"></div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="expert-filter p-3" style="background: #F1EBEB; border-radius: 10px">
                        <div class="filters">
                            <div class="price-filter my-2">
                                <div class="label mb-2">
                                    <span>Price</span>
                                </div>
                                <div class="range-input d-flex w-100 justify-content-between" id="price-range-input">
                                    <div class="field w-100 d-flex align-items-center">
                                        <span>Min</span>
                                        <input type="number" class="form-control input-min ms-2" data-key="input-min"
                                            value="0">
                                    </div>
                                    <div class="field w-100 d-flex align-items-center ms-1">
                                        <span>Max</span>
                                        <input type="number" class="form-control input-max ms-2" data-key="input-max"
                                            value="100000">
                                    </div>
                                </div>
                                <div class="range-slider mt-3" id="price-range-slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-slider-input position-relative" id="price-range-slider-input">
                                    <input type="range" name="minPrice" class="range-min" min="0" max="100000"
                                        value="0">
                                    <input type="range" name="minPrice" class="range-max" min="0" max="100000"
                                        value="100000">
                                </div>
                            </div>
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
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="7">
                                        <span class="ms-3">Business</span>
                                    </label>
                                    <br>
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="8">
                                        <span class="ms-3">Individual</span>
                                    </label>
                                    <br>
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="9">
                                        <span class="ms-3">Company</span>
                                    </label>
                                </div>
                            </div>
                            <div class="filter-group my-2" data-group-type="status">
                                <div class="label mb-2">
                                    <span>Types</span>
                                </div>
                                <div class="items">
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="7">
                                        <span class="ms-3">Business</span>
                                    </label>
                                    <br>
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="8">
                                        <span class="ms-3">Individual</span>
                                    </label>
                                    <br>
                                    <label class="filter form-check-label">
                                        <input type="checkbox" class="form-check-input" name="status" value="9">
                                        <span class="ms-3">Company</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row mt-0">
                        @foreach (range(1, 6) as $key)
                            <div class="col-md-6">
                                <div class="browse_content_wrapper">
                                    <div class="d-flex">
                                        <div class="col-lg-5">
                                            <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                alt="" class="browse_thumbail">
                                            <div class="rating text-center">
                                                <span class="mdi mdi-star rating"></span>
                                                <span class="mdi mdi-star rating"></span>
                                                <span class="mdi mdi-star rating"></span>
                                                <span class="mdi mdi-star rating"></span>
                                                <span class="mdi mdi-star rating"></span>
                                                <span class="browse_ratings">
                                                    4.3 ratings
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                            <button class="browse_card_button">Tax Expert</button>
                                            <h4 class="browse_card_exp">Experience: 10 years</h4>
                                            <h5 class="browse_card_company">Business, Individual,Company</h5>
                                            <p class="browse_card_price">Fee: 500/-</p>
                                        </div>
                                    </div>
                                    <div class="profile text-center">
                                        <button class="browse_card_cons">
                                            Consultation
                                        </button>
                                        <a href="{{ route('expert.profile', 1) }}" class="browse_card_view">View
                                            Profile</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
        // rangeInputs.forEach(input => {
        //     input.addEventListener("input", e => {
        //         let minVal = parseInt(rangeInputs[0].value)
        //         let maxVal = parseInt(rangeInputs[1].value)

        //         if ((maxVal - minVal >= priceGap) && maxVal <= 100000) {
        //             if (e.target.dataset.key === "input-min") {
        //                 rangeSliderInputs[0].value = minVal
        //                 progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
        //             } else {
        //                 rangeSliderInputs[1].value = maxVal
        //                 progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
        //             }
        //         } else {
        //             console.log('first')
        //         }

        //     })
        // });

        // rangeSliderInputs.forEach(input => {
        //     input.addEventListener("input", e => {
        //         let minVal = parseInt(rangeSliderInputs[0].value)
        //         let maxVal = parseInt(rangeSliderInputs[1].value)

        //         if (maxVal - minVal < priceGap) {
        //             e.target.className === "range-min" ?
        //                 rangeSliderInputs[0].value = maxVal - priceGap :
        //                 rangeSliderInputs[1].value = minVal - priceGap
        //         } else {
        //             rangeInputs[0].value = minVal
        //             rangeInputs[1].value = maxVal
        //             progress.style.left = (minVal / rangeSliderInputs[0].max) * 100 + "%"
        //             progress.style.right = 100 - (maxVal / rangeSliderInputs[1].max) * 100 + "%"
        //         }

        //     })
        // });

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
