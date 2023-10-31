@extends('frontend.layouts.app')
@section('main')
    <section class="row px-lg-5 px-2 mt-5">
        <h3 class="text-center">Industries We Serve</h3>
        <div class="d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="mb-3">
                        {!! $industries[0]->page_description !!}
                    </div>
                    @foreach ($industries as $industry)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="border bg-light w-100 px-0 px-md-3 px-lg-5 py-3 rounded h-100">
                                <a class="text-dark" href="{{ route('industry.page.show', $industry->id) }}">
                                    <div class="d-flex">
                                        <img loading="lazy" style="width:64px;" src="{{ useImage($industry->image) }}" class="rounded"
                                            alt="{{ $industry->title }}" />
                                        <h6 class="px-3">{{ $industry->title }}</h6>
                                    </div>
                                    <p class="tex-justify text-muted mt-2" style="max-width: 35ch;">{!! $industry->intro !!}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
                    <hr class="bg-light my-5 p-0">
            <div>
                <x-frontend.appointment-section :sections="$appointmentSections" />
            </div>
            <hr class="bg-light my-5 p-0">
        </div>
        <section class="mt-5 py-5" style="background: #474646;">
            <h3 class="text-light text-center">Our Valuable Partners</h3>
            <div class="scroll-wrapper align-itmes-center" style="justify-content: center;">
                <span id="next" class="mdi mdi-arrow-left-drop-circle-outline text-primary custom-icon"
                    role="button"></span>
                <div class="media-scroller snaps-inline">
                    {{-- Patner section is starting --}}
                    @foreach ($partners as $partner)
                        <div class="media-elements">
                            <div class="d-flex align-items-start gap-3 p-3" style="width: 100%;">
                                <div>
                                    <img loading="lazy" class="border image rounded-circle" src="{{ useImage($partner->image) }}"
                                        width="80px" height="80px" style="object-fit: cover" alt="">
    
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
        <script>
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

