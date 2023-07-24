@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />


    <div class="mt-4 mb-4">
        <div class="container">
            <h2 class="d-flex justify-content-center mb-3"><b>Client Studio</b></h2>
            <p class="text-center p-3">{!! $description !!}</p>
        </div>
    </div>

    {{-- Card --}}
    <div id="counter-section" class="my-5 bg-soft-secondary p-3">
        <div class="row">
            @foreach ($data as $datum)
                <div class="col-lg-2 col-md-4 my-2">
                    <div class="bg-primary rounded-3 overflow-hidden">
                        <div class="d-flex bg-white justify-content-around align-items-center p-3">
                            <img style="width:80px;aspect-ratio:1/1;" class="rounded rounded-circle"
                                src="{{ useImage($datum->image) }}" alt="{{ $datum->image }}">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <h2 class="counter-up m-0" style="font-size: 36px; color: #1abcfe; font-weight: 700;">
                                    {{ $datum->count }}</h2>
                            </div>
                        </div>
                        <div class="mt-auto px-2 py-2 w-100"
                            style='
                                    background: rgba(14, 14, 14, 0.758);  /* fallback for old browsers */
                                    background: -webkit-linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758);  /* Chrome 10-25, Safari 5.1-6 */
                                    background: linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758) /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                    '>
                            <p class="text-center text-light m-0" style="font-size: 16px;">
                                {{ strlen($datum->title) > 20 ? substr($datum->title, 0, 20) . '...' : $datum->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Lets discuss --}}
    <div class="mx-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img style="object-fit: cover;" class="rounded shadow w-100 h-100" src="{{ asset('frontend/assets/images/small/img-6.jpg') }}"/>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-5 rounded shadow w-100 h-100">
                        <h3 class="my-3">Let's Discuss your project</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, pariatur. Ex, nobis. Ratione
                            adipisci,
                            nemo
                            vitae dolore soluta cupiditate, optio officia, accusamus dignissimos unde quaerat? Lorem ipsum
                            dolor
                            sit
                            amet consectetur adipisicing elit. Iusto doloribus tempora et ipsam quo ullam
                        </p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('contact') }}" class="btn btn-primary" style="font-weight: 500; padding:0.8rem;">
                                <i class="fe-users"></i>
                                TALK TO OUR EXPERTS
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-frontend.testimonial-section :testimonials="getRecords('testimonials')">
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

            // let isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
            let isVisible = elemTop < window.innerHeight && elemBottom >= 0;
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
