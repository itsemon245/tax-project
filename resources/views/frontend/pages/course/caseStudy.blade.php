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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>
                {{ $packages[0]->title }}
            </h3>
            <div class="mt-3 mb-3">
                {!! $packages[0]->page_description !!}
            </div>
        </div>
        <div class="col-md-4 ">
            <div class=" card overflow-hidden">
                <img class="shadow-lg" src="{{ useImage($packages[0]->page_image) }}" alt="" width="100%" height="300px">
            </div>
        </div>
    </div>
</div>
<h3 class="text-center mt-5">Case Study Lab</h3>
<div class="row">
    <div class="col-12">
        <button id="filter-menu-btn" data-target="closed" class="btn btn-secondary rounded-1 d-lg-none my-3">
            <span class="mdi mdi-filter font-14"></span>
            Filter
        </button>
    </div>
    <div class="col-lg-3 ">
        <div class="filter-menu p-3 shadow bg-light rounded-2 mt-3">
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
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="mt-3 d-flex flex-wrap gap-3 justify-content-center">
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4">
                        <div class="px-2 py-2 mb-3 card">
                            <div class="card-body">
                                <h3>{{ $package->name }}</h3>
                                <h3>{{ $package->price }} &#2547; <span>{{ $package->billing_type }}</span></h3>
                                <small class="badge p-1 bg-success" style="font-weight: 500;">Monthly {{ $package->limit }}
                                    Orders
                                    Upload</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="bg-primary text-black p-2 text-center"
                                        href="{{ route('payment.create', ['model' => CaseStudyPackage::class, 'id' => $package->id]) }}">Choose</a>
                                </div>
                                <p class="mt-3 fw-bold">What your will get: <small
                                        class="bg-primary text-white p-1 rounded">Monthly {{ $package->limit }} Orders
                                        Upload</small></p>
                                <div>
                                    <ul class="px-3" style="list-style: decimal;">
                                        @foreach ($package->caseStudyCategories as $category)
                                            <li class="row justify-content-between mb-1">
                                                <span class="col-10">{{ $category->name }}</span>
                                                <div class="col-2">
                                                    <span class="badge bg-light p-2 text-dark w-100"
                                                        style="font-weight: 500;">{{ $category->caseStudies()->count() }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
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

