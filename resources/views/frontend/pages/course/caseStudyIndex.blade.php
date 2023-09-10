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

<div id="case-study">
    <div class="px-lg-5 px-2">
        <div class="d-flex center_sm mt-4">
            <h2 class="browse_header">Case Study</h2>
            <div class="line">
                <div class="circle_left"></div>
                <div class="circle_right"></div>
            </div>
        </div>
        
    <div class="row mt-2">
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
                            <span>Price</span>
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
                            <span>Packages</span>
                        </div>
                        <div class="items">
                            @foreach ($caseStudyPackages as $caseStudyPackage)
                            <label class="filter form-check-label" for="{{ $caseStudyPackage->id }}">
                                <input type="checkbox" class="form-check-input" name="status" value="{{ $caseStudyPackage->id }}" id="{{ $caseStudyPackage->id }}">
                                <span class="ms-3">{{ $caseStudyPackage->name }}</span>
                            </label>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-group my-2" data-group-type="status">
                        <div class="label mb-2">
                            <span>Categories</span>
                        </div>
                        <div class="items">
                            @foreach ($caseStudycategories as $caseStudyCategory)
                            <label class="filter form-check-label" for="{{ $caseStudyCategory->name}}">
                                <input type="checkbox" class="form-check-input" name="status" value="{{ $caseStudyCategory->name}}" id="{{ $caseStudyCategory->name}}"/>
                                <span class="ms-3">{{ $caseStudyCategory->name }}</span>
                            </label>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <section class="container">
                <div class="row">
                    @foreach ($caseStudies as $caseStudy)
                        <div class="col-md-4 mb-4">
                            <div class="h-100">
                                <div class="d-flex flex-column justify-content-between border border-2 rounded"
                                    style="overflow:hidden;">
                                    <div class="px flex-grow-1">
                                        <img src="{{ useImage($caseStudy->image) }}" class="mb-2" style="max-width:100%;"
                                            alt="">
                                        <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                            <b>{{ $caseStudy->name }}</b>
                                        </h4>
                                        <p class="text-center text-dark p-2 " style="font-size: 13px;">
                                            {{ $caseStudy->intro }}</p>
                                    </div>
                                    <div class="border-bottom border-dark mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <span class="like-btn mdi mdi-thumb-up-outline " role="button"></span>
                                            <span>21</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <span>14</span>
                                            <span class="mdi mdi-download" role="button"></span>
                                        </div>
                                    </div>
                                    <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <x-avg-review-stars :avg="0" class="text-white" />
                                        <p class="text-end text-light m-0" style="font-size: 13px;">
                                            @if ($caseStudy->price !== 'Free')
                                                <span class="fw-medium font-16">{{ $caseStudy->price }} </span> <span
                                                    class="mdi mdi-currency-bdt font-20"></span>
                                            @else
                                                <span class="fw-medium font-16 text-success">{{ $caseStudy->price }} </span>
                                            @endif

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $caseStudies->links('pagination::bootstrap-5') }}
                </div>
            </section>
        </div>
    </div>
    </div>
</div>
@endsection
@push('customJs')
    <script>
        $(document).ready(function() {
            $('.like-btn').each((i, btn) => {
                $(btn).click(function(e) {
                    let count = parseInt($(this).next().text())
                    $(this)
                        .toggleClass('mdi-thumb-up-outline')
                        .toggleClass('mdi-thumb-up text-primary')

                    if ($(this).hasClass('mdi-thumb-up text-primary')) {
                        $(this).next().text(count + 1)
                    } else {
                        $(this).next().text(count - 1)
                    }
                })
            })

        });
    </script>
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
