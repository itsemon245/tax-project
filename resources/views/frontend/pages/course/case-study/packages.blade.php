@extends('frontend.layouts.app')
@push('customCss')
    <style>
        .heading-text {
            width: max-content;
            margin-bottom: 8px;
        }

        @media screen and (min-width:540px) {
            .heading-text {
                width: 35vw;
                margin-bottom: 8px;
            }
        }
    </style>
@endpush
@section('main')
    <div class="container-lg mt-5">
        <div class="d-flex justify-content-center flex-wrap gap-3 px-3">
            <div class="heading-text">
                <h3>
                    Case Study Lab
                </h3>
                <div class="">
                    {!! $packages[0]->page_description !!}
                </div>
            </div>
            <div>
                <img loading="lazy" class="shadow-lg rounded" src="{{ useImage($packages[0]->page_image) }}" alt=""
                    height="300px" style="max-width:100%;object-fit: cover;">
            </div>
        </div>
    </div>
    <h3 class="text-center mt-5">Case Study Lab</h3>

    <div class="d-flex justify-content-center align-items-center flex-wrap gap-3">
        @foreach ($packages as $package)
            <div style="max-width: max-content;">
                <div class="mb-2 card h-100">
                    <div class="card-body">
                        <h3>{{ $package->name }}</h3>
                        <h3>{{ $package->price }} &#2547; <span>{{ $package->billing_type }}</span></h3>
                        <small class="badge p-1 bg-success" style="font-weight: 500;">Monthly {{ $package->limit }}
                            Orders
                            Upload</small>
                        <div class="d-flex justify-content-center my-3">
                            <a class="bg-primary text-black p-2 text-center"
                                href="{{ route('payment.create', ['model' => CaseStudyPackage::class, 'id' => $package->id]) }}">Choose</a>
                        </div>
                        <div class="d-flex gap-2 justify-content-between align-items-center mb-2">
                            <p class="fw-bold font-14 mb-0">What your will get:</p>
                            <div class="bg-primary text-white p-1 rounded">
                                Monthly {{ $package->limit }} Upload{{ $package->limit > 1 ? 's' : '' }}</div>
                        </div>
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
