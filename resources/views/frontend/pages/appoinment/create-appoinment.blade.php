@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />

    <div class="app_main">
        <div id="app_header">
            <div class="contaciner">
                <div class="row">
                    <div class="app_header_content text-center">
                        <h2>What are your sources of income?</h2>
                        <p>You may lorme ipsum dellor ahoid jksdfh lksdf</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="app_content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 d-flex flex-wrap">
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                        <div class="app_content_thumabil mb-3 position-relative">
                            <label for="check">
                                <input type="checkbox" class="checkbox">
                                <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                                <h2>Lorem Ipsum</h2>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-lg-column flex-md-row align-items-center justify-content-center">
                        <div class="app_icon">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="" class="icon_thumbail">
                            <h2>Professional</h2>
                        </div>
                        <div class="app_icon">
                            <img src="{{ asset('frontend/assets/images/Frame (2).png') }}" alt=""
                                class="icon_thumbail">
                            <h2>Professional</h2>
                        </div>
                        <div class="app_icon">
                            <img src="{{ asset('frontend/assets/images/Frame (1).png') }}" alt=""
                                class="icon_thumbail">
                            <h2>Professional</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="app_form_section" class="bg-white pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center pt-5 pb-4">Make Appointment</h2>
                        <div class="app_form rounded row  pb-5">
                            <h4 class="text-center pt-4">
                                Fill out Your Information
                            </h4>
                            <div class="col-lg-6 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Name</label>
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Email</label>
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Phone</label>
                                    <input type="number" class="form-control" placeholder="Phone">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Name</label>
                                    <select name="" class="form-control">
                                        <option value="" selected disabled>Appoinment Type
                                        </option>
                                        <option value="">Doctor</option>
                                        <option value="">Developer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Location</label>
                                    <select name="" class="form-control">
                                        <option value="" selected disabled>Select location
                                        </option>
                                        <option value="">Doctor</option>
                                        <option value="">Developer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Subject</label>
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 pb-2">
                                <div class="form-group px-3">
                                    <label class="label">Message</label>
                                    <textarea class="form-control pb-2" placeholder="Message" rows="4"></textarea>
                                </div>
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
