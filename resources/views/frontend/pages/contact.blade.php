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
            <div>
                <x-frontend.testimonial-section :testimonials="$reviews">
                </x-frontend.testimonial-section>
            </div>
        </div>
    </div>
@endsection
