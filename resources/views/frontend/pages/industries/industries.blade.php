@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
    $banners = getRecords('banners');
    $appointments = getRecords('appointments');
    $testimonials = getRecords('testimonials');
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />

    {{-- industries section  --}}
    <x-frontend.industries-section />

    {{-- Misc Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{$subCategories[0]->serviceCategory->name}}</h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($subCategories as $sub)
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center border rounded shadow-sm p-2 mb-3">
                    <a href="{{ route('service.sub', $sub->id) }}">
                        <img loading="lazy" style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                            src="{{ useImage($sub->image) }}" alt="">
                    </a>
                    <a class="text-dark text-capitalize" href="{{route('service.sub', $sub->id)}}"><h6>{{$sub->name}}</h6></a>
                    <a href="{{route('service.sub', $sub->id)}}" class="text-center text-muted">{{$sub->description}}</a>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>
   
    <x-frontend.appointment-section :sections="$appointments" />
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
    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection

@push('customJs')
    <script>
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
    </script>
@endpush
