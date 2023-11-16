@php
    $partners = getRecords('partner_sections');

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
                            <img loading="lazy" style="width:80px;aspect-ratio:1/1;" class="rounded rounded-circle"
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
                    <img loading="lazy" style="object-fit: cover;" class="rounded shadow w-100 h-100"
                        src="{{ asset('frontend/assets/images/small/img-6.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-5 rounded shadow w-100 h-100">
                        <h3 class="my-3">Let's Discuss your project</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque, pariatur. Ex,
                            nobis. Ratione
                            adipisci,
                            nemo
                            vitae dolore soluta cupiditate, optio officia, accusamus dignissimos unde quaerat? Lorem ipsum
                            dolor
                            sit
                            amet consectetur adipisicing elit. Iusto doloribus tempora et ipsam quo ullam
                        </p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('contact') }}" class="btn btn-primary"
                                style="font-weight: 500; padding:0.8rem;">
                                <i class="fe-users"></i>
                                TALK TO OUR EXPERTS
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div>
        <x-frontend.appointment-section :sections="$appointmentSections" />
    </div>
    <section class="mt-5 py-5" style="background: #474646;">
        <h3 class="text-light text-center">Our Valuable Partners</h3>
        <div class="scroll-wrapper">
            <span id="next" class="mdi mdi-arrow-left-drop-circle-outline text-primary custom-icon"
                role="button"></span>
            <div class="media-scroller snaps-inline">

                {{-- Patner section is starting --}}
                @foreach ($partners as $partner)
                    <div class="media-elements">
                        <div class="d-flex align-items-start gap-3 p-3" style="width: 100%;">
                            <div>
                                <img loading="lazy" class="border image rounded-circle"
                                    src="{{ useImage($partner->image) }}" width="80px" height="80px"
                                    style="object-fit: cover" alt="">

                            </div>
                            <div>
                                <h4 class="mb-0">{{ $partner->name }}</h4>
                                <small class="mb-0 text-muted">{{ $partner->designation }}</small>
                                <div class="d-flex mb-0 mt-2 text-primary">
                                    <a href="mailto:{{ $partner->email }}">
                                        <span class="mdi mdi-email font-16 me-2"></span><span>{{ $partner->email }}</span>
                                    </a>
                                </div>
                                <a href="tel:{{ $partner->phone }}">
                                    <span class="mdi mdi-phone font-16 me-2"></span><span>{{ $partner->phone }}</span>
                                </a>
                                <div class="d-flex text-primary">
                                    <a href="{{ $partner->facebook }}">
                                        <i class="fe-facebook me-3"></i>
                                    </a>
                                    <a href="{{ $partner->twitter }}">
                                        <i class="fe-twitter me-3"></i>
                                    </a>
                                    <a href="{{ $partner->linkedin }}">
                                        <i class="fe-linkedin me-3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <span id="prev" class="mdi mdi-arrow-right-drop-circle-outline text-primary custom-icon"
                role="button"></span>
        </div>
    </section>

@endsection

@push('customCss')
    <style>
        .scroll-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
        }


        @media (min-width: 970px) {
            .scroll-wrapper {
                padding: 1rem 5rem
            }
        }

        @media (min-width: 640px) {
            .scroll-wrapper {
                gap: 1rem;
                padding: 2rem;
            }
        }

        .media-scroller {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            overscroll-behavior-inline: contain;
            scroll-behavior: smooth;
        }

        .media-elements {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 10px;
            max-width: 45ch;
        }

        .media-elements .comment {
            display: inline;
            margin: 0;
            text-align: justify;
        }

        #next,
        #prev {
            background: none;
            border: none;
            padding: 0;
        }

        .media-scroller::-webkit-scrollbar {
            appearance: none;
            display: none;
        }

        .snaps-inline {
            scroll-snap-type: inline mandatory;
            scroll-padding-inline: 5rem;
        }

        .snaps-inline>* {
            scroll-snap-align: start;
        }
    </style>
@endpush


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
        const container = document.querySelector('.media-scroller');
        const next = document.getElementById('next')
        const prev = document.getElementById('prev')
        const scrollElementWidth = parseInt($('.media-elements').css('width').split('px')[0])
        const scrollUnit = scrollElementWidth + 20;
        container.addEventListener('wheel', e => {
            e.preventDefault();
            container.scrollLeft += e.deltaY;
        })

        next.addEventListener('click', () => {
            container.scrollLeft -= scrollUnit;
        })
        prev.addEventListener('click', () => {
            container.scrollLeft += scrollUnit;
        })
    </script>
@endpush
