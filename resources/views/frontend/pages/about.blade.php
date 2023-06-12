@php
    $banners =getRecords('banners');
    $partners = getRecords('partner_sections');
@endphp
@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <div class="container">
        {{-- About us section --}}
        <section class="my-5">
            <h3 class="text-center my-3">About Us</h3>
            <div class="">
                <div class="bg-secondary p-3 rounded">
                    <p class="d-flex justify-content-left p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Odit repudiandae, nisi omnis fuga quis expedita, culpa ad beatae mollitia maxime commodi non? Excepturi
                        omnis laborum voluptatem? Nobis adipisci eum eius ipsam deleniti ipsa delectus qui! Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Beatae optio dignissimos natus molestiae ut dolorum cum quaerat
                        ratione dolores soluta. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus maxime
                        iusto dolore cumque repudiandae aperiam aspernatur. Eveniet deserunt nobis sit aspernatur incidunt
                        tenetur, reiciendis numquam iusto. Velit perspiciatis neque ipsam.</p>
                </div>
            </div>
        </section>



        {{-- Sections --}}
        <div class="row justify-content-center">

            <div class="">
                {{-- Left side content --}}
                <div class="row justify-content-center">
                    {{-- Section One --}}
                    <div class="row mb-4 justify-content-sm-center gap-sm-3">
                        <h4 class="col-sm-12 col-5 p-0">Recurment Documents</h4>
                        <div class="col-sm-3 col-6 mb-3 mb-sm-0 p-0 flex-grow-1">
                            <img class="w-100 rounded" src="{{ asset('frontend/assets/images/bg-material.png') }}" alt=""/>
                        </div>
                        <div class="col-sm-8 p-4 bg-secondary rounded">
                            <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                            </p>
                        </div>
                    </div>

                        {{-- Section two --}}
                    <div class="row mb-4 justify-content-sm-center gap-sm-3">
                    <h4 class="col-sm-12 col-5 p-0">Recurment Documents</h4>
                    <div class="col-sm-3 col-6 mb-3 mb-sm-0 p-0 flex-grow-1">
                        <img class="w-100 rounded" src="{{ asset('frontend/assets/images/bg-material.png') }}" alt=""/>
                    </div>
                    <div class="col-sm-8 p-4 bg-secondary rounded">
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt in modi aperiam ducimus, possimus tempore eaque nulla iure impedit ut.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <section class="mt-5 py-5" style="background: #474646;">
        <h3 class="text-light text-center">Our Valuable Partners</h3>
        <div class="scroll-wrapper">
            <span id="next" class="ti-arrow-circle-left custom-icon"></span>
            <div class="media-scroller snaps-inline">

                {{-- Patner section is starting --}}
                @foreach ($partners as $partner)
                <div class="media-elements">
                    <div class="d-flex align-items-center gap-3 p-3" style="width: 100%;">
                        <div>
                            <img class="border image rounded-circle"
                                src="{{useImage($partner->image) ==! null ? 'useImage($partner->image)' : 'https://api.dicebear.com/6.x/bottts/png' }}" alt="">

                        </div>
                        <div>
                            <h3 class="mb-0">{{ $partner->name }}</h3>
                            <small class="mb-0 text-muted">{{ $partner->designation }}</small>
                            <div class="d-flex mb-0 mt-2 text-primary">
                               <a href="mailto:{{ $partner->email }}">
                                <p class="me-2 mb-0"><i class="fe-mail"></i></p>
                                <p class="mb-0">{{ $partner->email }}</p>
                               </a>
                            </div>
                            <div class="d-flex text-primary">
                               <p class="me-2 mb-0"> <i class="fe-phone"></i></p>
                                <p class="mb-0">{{ $partner->phone }}</p>
                            </div>
                            <div class="d-flex mt-3 text-primary">
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
            <span id="prev" class="ti-arrow-circle-right custom-icon"></span>
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
