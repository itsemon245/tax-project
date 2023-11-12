@php
    $banners = getRecords('banners');
    $partners = getRecords('partner_sections');
@endphp
@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <div class="container">
        {{-- Industry section --}}
        <section class="my-5">
            <h3 class="text-center my-3">{{ $industry->title }}</h3>
            <div class="">
                <div class="bg-secondary rounded">
                    <p class="d-flex justify-content-left p-3">{!! $industry->description ?? '<p class="text-center pb-3">No Data</p>' !!}</p>
                </div>
            </div>
        </section>
        <div class="mx-2 my-5">
                @foreach ($industry->sections as $section)
                <div class="row mb-4">
                    <div class="col-sm-3 col-4 mb-3 mb-sm-0 p-0 flex-grow-1">
                        @isset($section['image'])
                            <img loading="lazy" class="w-100 h-100 rounded" src="{{ useImage($section['image']) }}" alt="" />
                        @endisset
                    </div>
                    <div class="col-sm-9 col-8">
                        <div class="bg-light rounded shadow w-100 h-100">
                            <p class="d-flex justify-content-left p-2 mb-0">{!! strlen($industry->description) >= 85 ? \Illuminate\Support\Str::limit($industry->description, 85, $end='...') : '' !!}</p>
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
        {{-- Make Appoinment Section here --}}
        <x-frontend.appointment-section :sections="$appointmentSections" />

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
    {{-- Industry us content --}}
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
        }

        .media-elements .comment {
            width: 100px;
            display: inline;
            margin: 0;
            text-align: justify;
        }

        .media-elements .image {
            max-width: 70px;
        }

        @media (min-width:600px) {
            .media-elements .image {
                max-width: 120px;
            }

            .media-elements .comment {
                width: 200px
            }
        }

        #next,
        #prev {
            background: none;
            border: none;
            padding: 0;
        }

        .custom-icon {
            color: var(--bs-primary);
            font-size: 28px;
            margin: 0 5px;
            cursor: pointer;
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
