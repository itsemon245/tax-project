@php
    $banners = getRecords('banners');
    $testimonials = getRecords('testimonials');
@endphp
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
    <x-frontend.hero-section :banners="$banners" />
    <div id="case-study">
        <div class="px-lg-5 px-2">
            <div class="d-flex center_sm mt-4">
                <h2 class="browse_header">All Books</h2>
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
            <div class="col-lg-3">
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
                                <span>Categories</span>
                            </div>
                            <div class="items">
                                @foreach ($bookCategories as $bookCategory)
                                <label class="filter form-check-label" for="{{Str::slug($bookCategory->name , '-')}}">
                                    <input type="checkbox" class="form-check-input" name="status" value="{{ $bookCategory->id}}" id="{{Str::slug($bookCategory->name , '-')}}"/>
                                    <span class="ms-3">{{ $bookCategory->name }}</span>
                                </label>
                                <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-group my-2" data-group-type="status">
                            <div class="label mb-2">
                                <span>Author</span>
                            </div>
                            <div class="items">
                                @foreach ($books as $book)
                                <label class="filter form-check-label" for="{{Str::slug($book->author , '-')}}">
                                    <input type="checkbox" class="form-check-input" name="status" value="{{ $book->id }}" id="{{Str::slug($book->author , '-')}}">
                                    <span class="ms-3">{{ $book->author }}</span>
                                </label>
                                <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <section class="py-12 py-sm-24 py-md-32 ">
                    <div class="container">
                        <div class="row">
                            @forelse ($books as $book)
                                <div class="col-lg-4 mb-3">
                                    <a href="{{ route('books.show', $book->id) }}">
                                        <div>
                                            <div
                                                class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                                <img src="{{ useImage($book->thumbnail) }}" alt="{{ $book->title }}"
                                                    style="object-fit: cover; width: 100%" />
    
                                                <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                                    <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                                        <b>{{ $book->title }}</b>
                                                    </h4>
                                                    <p class="text-center text-dark mt-3"
                                                        style="font-size: 13px;
                                        line-height: 16px;">
                                                        {!! str($book->description)->limit(100, '<span class="text-danger font-20 fw-bold">...</span>') !!}
                                                    </p>
                                                </div>
                                                <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                                    style='
                                        background: rgba(14, 14, 14, 0.758);  /* fallback for old browsers */
                                        background: -webkit-linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758);  /* Chrome 10-25, Safari 5.1-6 */
                                        background: linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758) /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                        '>
                                                    {{-- <x-avg-review-stars :avg="$book->reviews_avg_rating" class="text-white" /> --}}
                                                    <p class="mb-0 text-white fw-mideum"> {{ $book->price }} <span
                                                            class="mdi mdi-currency-bdt font-16"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @empty
                                <div class="bg-light text-center p-3 d-flex align-items-center justify-content-center">
                                    No Books found in this category
                                </div>
                                @endforelse
                                {{ $books->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </section>
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
