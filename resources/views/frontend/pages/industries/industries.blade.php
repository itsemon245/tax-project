@php
    $banners = getRecords('banners');
    $appointments = getRecords('appointments');
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />

    {{-- industries section  --}}
    <x-frontend.industries-section />

    <x-section.custom-service :customServices="$customServices" />

    {{-- Misc Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{ $subCategories[0]->serviceCategory->name }}
        </h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($subCategories as $sub)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="d-flex flex-column align-items-center border rounded shadow-sm p-2 mb-3">
                        <a href="{{ route('service.sub', $sub->id) }}">
                            <img loading="lazy" style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                                src="{{ useImage($sub->image) }}" alt="">
                        </a>
                        <a class="text-dark text-capitalize" href="{{ route('service.sub', $sub->id) }}">
                            <h6>{{ $sub->name }}</h6>
                        </a>
                        <a href="{{ route('service.sub', $sub->id) }}"
                            class="text-center text-muted">{{ $sub->description }}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <x-frontend.appointment-section :sections="$appointments" />

    <x-frontend.achievements :achievements="$achievements" />

    @if($infos1->count()>0)
    <x-frontend.info-section :title="$infos1[0]->title" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    @endif
    @if($infos2->count()>0)
        <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    @endif
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
