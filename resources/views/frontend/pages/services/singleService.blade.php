@php
    $banners = getRecords('banners');
@endphp
@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <div class="container">
        {{-- About us section --}}
        <section class="my-5">
            <h3 class="text-center my-3">{{ $service->title }}</h3>
            <div class="">
                <div class="bg-secondary p-3 rounded">
                    <p class="d-flex justify-content-left p-3">{{ $service->description }}</p>
                </div>
            </div>
        </section>



        {{-- Sections --}}
        <div class="row justify-content-center">

            {{-- Price Section --}}
            <div class="col-md-4 pt-1 d-md-none mb-5">
                <div class="card p-4 mt-4">
                    <div class="px-3">
                        <h1 class="p-4 text-success">Tk. {{ $service->price }}/-</h1>
                        <h4 class="px-4 mb-4">Save up to
                            {{ $service->discount }}{{ $service->is_discount_fixed ? 'Tk' : '%' }}</h4>
                        <div class="px-4 mb-2">{!! $service->price_description !!}</div>
                        <div class="px-4 text-muted mb-2 d-flex">
                            <p class="me-3 d-flex align-items-center gap-2"><span
                                    class="mdi mdi-clock-time-three-outline"></span>Delivery in
                                {{ Carbon\Carbon::parse($service->delivery_date)->addDays(1)->diffInDays() }} Days</p>
                        </div>
                        <div class="px-4">
                            <a href="#"
                                class="w-100 d-flex justify-content-center mt-4 align-items-center btn btn-dark btn-sm">Continue<i
                                    class="mx-2 mdi mdi-arrow-collapse-right "></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                {{-- Left side content --}}
                <div class="row justify-content-center">
                    {{-- Sections --}}
                    @foreach (json_decode($service->sections) as $section)
                        <div class="row mb-4 justify-content-sm-center gap-sm-3">
                            <h4 class="col-sm-12 col-5 p-0">{{ $section->title }}</h4>
                            <div class="col-sm-3 col-6 mb-3 mb-sm-0 p-0 flex-grow-1">
                                <img loading="lazy" class="w-100 rounded" src="{{ useImage($section->image) }}"
                                    alt="{{ $section->title }}" />
                            </div>
                            <div class="col-sm-8 p-4 bg-secondary rounded">
                                {!! $section->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Price Section --}}
            <div class="col-md-4 pt-1 d-none d-md-block">
                <div class="card p-4 mt-4">
                    <div class="px-3">
                        <h1 class="p-4 text-success">Tk. {{ $service->price }}/-</h1>
                        <h4 class="px-4 mb-4">Save up to
                            {{ $service->discount }}{{ $service->is_discount_fixed ? 'Tk' : '%' }}</h4>
                        <div class="px-4 mb-2">{!! $service->price_description !!}</div>
                        <div class="px-4 text-muted mb-2 d-flex">
                            <p class="me-3 d-flex align-items-center gap-2"><span
                                    class="mdi mdi-clock-time-three-outline"></span>Delivery in
                                {{ Carbon\Carbon::parse($service->delivery_date)->addDays(1)->diffInDays() }} Days</p>
                        </div>
                        <div class="px-4">
                            <a href="{{ route('payment.create', ['model' => Service::class, 'id' => $service->id]) }}"
                                class="w-100 d-flex justify-content-center mt-4 align-items-center btn btn-dark btn-sm">Continue<i
                                    class="mx-2 mdi mdi-arrow-collapse-right "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <div class="d-flex align-items-start gap-3 p-3">
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
    {{-- About us content --}}
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
