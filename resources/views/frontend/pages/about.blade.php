@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />
    <div class="row mt-4 mb-4">
        {{-- About us section --}}
        <h3 class="d-flex justify-content-center mb-4">ABOUT US</h3>
        <div class="col-md-11 d-flex justify-content-center mx-5">
            <div class="text-bg-secondary p-4">
                <h5 class="d-flex justify-content-left mx-5 p-3">Lorem ipsum dolor sit amet.</h5>
                <p class="d-flex justify-content-left mx-5 p-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Odit repudiandae, nisi omnis fuga quis expedita, culpa ad beatae mollitia maxime commodi non? Excepturi
                    omnis laborum voluptatem? Nobis adipisci eum eius ipsam deleniti ipsa delectus qui! Lorem ipsum dolor
                    sit amet consectetur adipisicing elit. Beatae optio dignissimos natus molestiae ut dolorum cum quaerat
                    ratione dolores soluta. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus maxime
                    iusto dolore cumque repudiandae aperiam aspernatur. Eveniet deserunt nobis sit aspernatur incidunt
                    tenetur, reiciendis numquam iusto. Velit perspiciatis neque ipsam.</p>
            </div>
        </div>
    </div>

    {{-- Section --}}
    <div class="row h-400 mx-5">
        <h3 class="mb-3 mt-5">Lorem ipsum dolor sit amet.</h3>
        <div class="col-md-4 px-2">
            <img src="{{ asset('frontend/assets/images/products/product-11.jpg') }}" style="width: 100%;max-height:18rem;">
        </div>
        <div class="col-md-8 text-bg-light p-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloribus tempora et ipsam quo ullam
                exercitationem optio consequatur culpa omnis error, quidem magnam ut inventore natus minus rem, commodi
                earum suscipit vel minima voluptate numquam est. Labore nam rem voluptatem?</p>
        </div>
    </div>

    {{-- Section --}}
    <div class="row h-400 mx-5">
        <h3 class="mb-3 mt-5">Lorem ipsum dolor sit amet.</h3>
        <div class="col-md-4 px-2">
            <img src="{{ asset('frontend/assets/images/products/product-10.jpg') }}" style="width: 100%;max-height:18rem;">
        </div>
        <div class="col-md-8 text-bg-light p-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloribus tempora et ipsam quo ullam
                exercitationem optio consequatur culpa omnis error, quidem magnam ut inventore natus minus rem, commodi
                earum suscipit vel minima voluptate numquam est. Labore nam rem voluptatem?</p>
        </div>
    </div>
    <h3 class="d-flex justify-content-center mt-5">Lorem ipsum dolor sit amet.</h3>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <section class="mt-5 py-5" style="background: #474646;">
        <h3 class="text-light text-center">Our Valuable Partners</h3>
        <div class="scroll-wrapper">
            <span id="next" class="ti-arrow-circle-left custom-icon"></span>
            <div class="media-scroller snaps-inline">

                {{-- Patner section is starting --}}
                <div class="media-elements">
                    <div class="d-flex align-items-center gap-3 p-3" style="width: 100%;">
                        <div>
                            <img class="border image rounded-circle"
                                src="{{ asset('backend/assets/images/users/user-8.jpg') }}" alt="">

                        </div>
                        <div>
                            <h3 class="mb-0">Mr. Md Parvez</h3>
                            <small class="mb-0 text-muted">Web Developer</small>
                            <div class="d-flex mb-0 mt-2 text-primary">
                                <p class="me-2 mb-0"><i class="fe-mail"></i></p>
                                <p class="mb-0">pj.parvez45@gmail.com</p>
                            </div>
                            <div class="d-flex text-primary">
                               <p class="me-2 mb-0"> <i class="fe-phone"></i></p>
                                <p class="mb-0"> +880 1885-518864</p>
                            </div>
                            <div class="d-flex mt-3 text-primary">
                                <i class="fe-facebook me-3"></i>
                                <i class="fe-twitter me-3"></i>
                                <i class="fe-linkedin me-3"></i>
                            </div>
                        </div>
                    </div>
                </div>

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
