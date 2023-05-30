@extends('frontend.layouts.app')
@section('main')
    <div class="row mb-4">
        <div class="col-md-3 container mt-5 card bg-info text-light">
            <div class="p-4 card-body">
                <p>Lorem ipsum dolor sit, ame elit.</p>
                <h2 class="mt-3">443 Taka</h2>
                <table class="table mt-3 text-light">
                    <tbody>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="mt-5 mb-3">
                    <a href="#" class="btn btn-dark w-100">Request Referlink</a>
                  </div>
                  <div class="container">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, recusandae, provident et quidem vel dolor illum doloribus debitis dolores soluta omnis voluptatibus ea repudiandae eum nulla, alias nemo maiores hic!
                        </p>
                  </div>
            </div>
        </div>
        <div class="col-md-7 container mt-5">
            <div class="row">
                <div class="col-md-5 card container">
                    <div class="card-body ">
                       <h1 class="text-success mt-4 d-flex justify-content-center">2</h1>
                       <p class="d-flex justify-content-center mt-0">Singup's</p>
                    </div>
                </div>
                <div class="col-md-6 card container">
                    <div class="card-body ">
                       <h1 class="text-success mt-4 d-flex justify-content-center">4</h1>
                       <p class="d-flex justify-content-center mt-0">Conversation</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 container bg-info card">
                    <div class="card-body ">
                        <div class="container p-3">
                            <span class="text-light">
                                Your Unique Referral Link :
                            </span>
                            <div class="mt-2">
                                <input type="text" placeholder="http:tax-project.wisedev.xyz/refer-link..." class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row card mt-4 container m-2 p-4">
                <h2>Your Refereals</h2>
                <table class="table mt-3 text-dark">
                    <tbody>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit.</td>
                        <td>43</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
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
