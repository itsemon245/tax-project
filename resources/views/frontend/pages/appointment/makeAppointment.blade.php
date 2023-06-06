@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />

    <div class="app_main">
        <div id="app_form_section" class="bg-white pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center pt-5 pb-4">Make Appointment</h2>
                        <div class="app_form rounded row  pb-5">
                            <h4 class="text-center pt-4">
                                Fill out Your Information
                            </h4>
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Name" type="text" placeholder="Name" name="name" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Email" type="text"  placeholder="Email" name="email" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Phone" type="number"  placeholder="Phone" name="phone" />
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                    <x-backend.form.select-input label="Appointment Type" name="type" placeholder="Appointment Type">
                                        <option value="physical" @if ($isPhysical)
                                            selected
                                        @endif>Physical</option>
                                        <option value="virtual" @if (!$isPhysical)
                                            selected
                                        @endif>Virtual</option>
                                    </x-backend.form.select-input>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                    <x-backend.form.select-input label="Location" name="location" placeholder="Location">
                                        <option value="">Doctor</option>
                                        <option value="">Developer</option>
                                    </x-backend.form.select-input>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12 mb-2">
                                    <x-backend.form.text-input label="Subject" name="subject" type="text" placeholder="Subject" />
                            </div>
                            <div class="col-lg-12 col-12 mb-2">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                            </div>
                            <div class="col-lg-12 col-12 pb-2">
                                <div class="form-group px-3">
                                    <x-backend.ui.button class="btn-primary mt-2 text-white">Submit
                                    </x-backend.ui.button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-frontend.testimonial-section :$testimonials>
    </x-frontend.testimonial-section>
@endsection
