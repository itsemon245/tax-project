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
                <div class="bg-secondary p-3 rounded">
                    <p class="d-flex justify-content-left p-3">{!! $industry->description ?? '<p class="text-center pb-3">No Data</p>' !!}</p>
                </div>
            </div>
        </section>



        {{-- Sections --}}
        <div class="row justify-content-center">

            <div class="">
                {{-- Left side content --}}
                <div class="row justify-content-center">

                    @foreach ($industry->sections as $section)
                        {{-- Sections --}}
                        <div class="row mb-4 justify-content-sm-center gap-sm-3">
                            <h4 class="col-sm-12 col-5 p-0">{{ $section['title'] }}</h4>
                            <div class="col-sm-3 col-6 mb-3 mb-sm-0 p-0 flex-grow-1">
                                @isset($section['image'])
                                    <img loading="lazy" class="w-100 rounded" src="{{ useImage($section['image']) }}" alt="" />
                                @endisset
                            </div>
                            <div class="col-sm-8 p-4 bg-secondary rounded">
                                <p>
                                    {!! $section['description'] !!}
                                </p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
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
