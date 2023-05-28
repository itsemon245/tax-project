@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />
    <div class="row mt-4 mb-4">
        {{-- About us section --}}
        <h3 class="d-flex justify-content-center mb-4">Import Regristrion Certificate.</h3>
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
        <div class="col-md-12">
           <div class="row">
            <div class="col-md-6">
                {{-- Section one --}}
                <div class="row border p-2 mb-4">
                    <h4>Recurment Documents</h4>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('frontend/assets/images/bg-material.png') }}" height="50%" width="60%" alt="" srcset="">
                    </div>
                    <div class="col-md-8 border p-4 bg-secondary">
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Tread LicenceLice</li>
                                    <li>TIN Certificateicate</li>
                                    <li>Tread Licence</li>
                                    <li>TIN Certificate</li>
                                    <li>Tread Licence</li>
                                    <li>TIN Certificate</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>Tread Licence</li>
                                    <li>TIN Certificate</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Section two --}}
                <div class="row border p-2 mb-4">
                    <h4>Govt. Fee</h4>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('frontend/assets/images/bg-material.png') }}" height="50%" width="60%" alt="" srcset="">
                    </div>
                    <div class="col-md-8 border p-4 bg-secondary">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Descriptions</th>
                                <th scope="col">Fees</th>
                              </tr>
                            </thead>
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
                {{-- Section one --}}
                <div class="row border p-2 mb-4">
                    <h4>Remark</h4>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('frontend/assets/images/bg-material.png') }}" height="50%" width="60%" alt="" srcset="">
                    </div>
                        <div class="col-md-8 border p-4 bg-secondary">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul>
                                        <li>Lorem ipsum dolor sit.</li>
                                        <li>Lorem ipsum dolor sit.</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- section  --}}
            <div class="col-md-6">
                <div class="px-3">
                    <div class="card p-4">
                        <div class="px-3">
                            <h1 class="p-4 text-success">$145</h1>
                            <h4 class="px-4 mb-4">Save up to 10% with <span class="text-success text-bold">Subscribe to save</span></h4>
                            <p class="px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corporis ratione neque officiis aspernatur enim voluptate perspiciatis. Quo, porro voluptatum?</p>
                                <div class="px-4 text-muted mb-2 d-flex">
                                    <p class="me-3"><i class="mdi mdi-clock-time-three-outline"></i> 2 Days Delivery</p>
                                    <p><i class="mdi mdi-rotate-3d-variant"></i> 3 Revisions</p>
                                </div>
                                <div class="px-4">
                                    <ul>
                                        <li>Lorem, ipsum dolor.</li>
                                        <li>Lorem, ipsum dolor.</li>
                                        <li>Lorem, ipsum dolor.</li>
                                    </ul>
                                    <a href="#"  class="w-100 d-flex justify-content-center mt-4 align-items-center btn btn-dark btn-sm">Continue<i class="mx-2 mdi mdi-arrow-collapse-right "></i></a>
                                </div>
                        </div>
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
                                <a href="#">
                                    <i class="fe-facebook me-3"></i>
                                </a>
                                <a href="#">
                                    <i class="fe-twitter me-3"></i>
                                </a>
                                <a href="#">
                                    <i class="fe-linkedin me-3"></i>
                                </a>
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
