@extends('frontend.layouts.app')
@section('main')
    {{-- contact header start --}}
    <div class="text-center my-5">
        <h2>Let’s Discuss your Project</h2>
        <h3>Which office do you prefer?</h3>
    </div>
    <div id="contact_details">
        <div class="container">
            <div class="row" style="flex-direction: row-reverse;">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <embed style='object-fit:cover;' src="{{ $maps[0]->src }}" class="border w-100 rounded-3 shadow-sm h-100" />
                </div>

                <div class="col-lg-6">
                    <div id="office-details" class="rounded-3 shadow-sm border w-100 bg-light p-3">
                        @foreach ($maps as $key => $map)
                            <div class="p-3 mb-4">
                                <h4>{{ $map->location }}</h4>
                                <div class="mb-3">{!! $map->address !!}</div>
                                <div class="d-flex gap-5">
                                    <div>
                                        <a href="#" class="text-dark fw-bold"
                                            style="text-decoration: underline!important;">Office
                                            Details</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('appointment.make') }}" class="text-dark fw-bold"
                                            style="text-decoration: underline!important;">Make
                                            Appointment</a>
                                    </div>
                                </div>
                            </div>
                            @if ($key + 1 !== count($maps))
                                <hr class="bg-light">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <hr class="bg-light my-5 p-0">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div id="contact-info" class="px-5 rounded-3 bg-gradient text-light p-5 h-100" style="background: #0891B2;">
                        <div class="d-flex gap-3 mb-2">
                            <div class="py-2 px-3 bg-primary rounded">
                                <span class="mdi mdi-email-outline text-light"></span>
                            </div>
                            <div class="">
                                <h4 class="mb-0">Mail us at</h4>
                                <p class="mb-0">emdadctg@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-2">
                            <div class="py-2 px-3 bg-primary rounded">
                                <span class="mdi mdi-phone text-light"></span>
                            </div>
                            <div class="">
                                <h4 class="mb-0">Mail us at</h4>
                                <p class="mb-0">emdadctg@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <div class="py-2 px-3 bg-primary rounded">
                                <span class="mdi mdi-whatsapp text-light"></span>
                            </div>
                            <div class="">
                                <h4 class="mb-0">Mail us at</h4>
                                <p class="mb-0">emdadctg@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-2">
                            <div class="py-2 px-3 bg-primary rounded">
                                <span class="mdi mdi-web text-light" style="font-size:28px;"></span>
                            </div>
                            <div class="">
                                <h4 class="mb-0">Mail us at</h4>
                                <div class="mb-0">
                                    <span class="mdi mdi-facebook"></span>
                                    <span class="mdi mdi-youtube"></span>
                                    <span class="mdi mdi-twitter"></span>
                                    <span class="mdi mdi-linkedin"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="contact-form" class="bg-light p-4 rounded-3 h-100">
                        <h5 class="text-center">Let’s Talk</h5>
                        <h6 class="text-center mb-3">You are quite important to us . We reply as soon as
                            possible</h6>
                        <form action="{{ route('project-discussion.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-backend.form.text-input id="name" type="text" name="name" label="Name"
                                        required />
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input id="email" type="email" name="email" label="Email"
                                        required />
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input id="phone" type="tel" name="phone" label="Phone" />
                                </div>
                                <div class="col-md-6">
                                    <x-backend.form.text-input id="location" type="text" name="location" label="Location" />
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label for="message">Message</label><span class="text-danger">*</span>
                                        <textarea name="message" class="form-control" id="message" placeholder="Message" cols="30" rows="3"
                                            required></textarea>
                                        @error('message')
                                            <span>
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button class="btn btn-primary text-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
