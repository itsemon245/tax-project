@extends('frontend.layouts.app')
@section('main')
    {{-- contact header start --}}
    <div id="contact_header">
        <div class="container">
            <div class="row">
                <div class="contact_content">
                    <h2>Let’s Discuss your Project</h2>
                    <h3>Which office do you prefer?</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- contact end --}}
    {{-- contact details start --}}
    <div id="contact_details">
        <div class="container">
            <div class="row m-auto">
                <div class="col-lg-6 col-md-12 pt-lg-0 order-lg-1 pt-md-3 contact_image order-md-1">
                    <div class="contact_thumb">
                        <img src="{{ asset('frontend/assets/images/Rectangle 28.png') }}" alt="" class="contact_map">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-0 pt-3 pt-md-0 pt-lg-0 order-md-0 position-relative">
                    <div class="contact_info">
                        <div class="row">
                            <div class="col-md-12 pb-4">
                                <h4>42, Hamilton, PKWY</h4>
                                <h5>Brooklyn, NY</h5>
                                <h6>+88016-43428395</h6>
                                <p>By appointment</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="#" class="office">Office Details</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="appointment">Make Appointment</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="sperator" />
                            <div class="col-md-12 pt-4">
                                <h4>42, Hamilton, PKWY</h4>
                                <h5>Brooklyn, NY</h5>
                                <h6>+88016-43428395</h6>
                                <p>By appointment</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="#" class="office-2">Office Details</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="appointment-2">Make Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- contact details end --}}
    {{-- contact info start --}}
    <div id="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 px-4 px-md-4 px-lg-4">
                    <div class="contact_wrapper text-white">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-1 col-2">
                                        <div class="contact_info_thumb mx-auto">
                                            <img src="{{ asset('frontend/assets/images/Group 120.png') }}" alt=""
                                                class="d-inline-block contact_img">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="contact_address px-3 pt-3">
                                            <h4>Mail us at</h4>
                                            <p>emdadctg@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-1 col-2">
                                        <div class="contact_info_thumb mx-auto">
                                            <img src="{{ asset('frontend/assets/images/Group 121.png') }}" alt=""
                                                class="d-inline-block contact_img">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="contact_address px-3 pt-3">
                                            <h4>Call us</h4>
                                            <p>emdadctg@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-1 col-2">
                                        <div class="contact_info_thumb mx-auto">
                                            <img src="{{ asset('frontend/assets/images/Group 123.png') }}" alt=""
                                                class="d-inline-block contact_img">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="contact_address px-3 pt-3">
                                            <h4>Chat via whatsApp</h4>
                                            <p>emdadctg@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row justify-content-center align-items-center g-2">
                                    <div class="col-md-1 col-2">
                                        <div class="contact_info_thumb mx-auto">
                                            <img src="{{ asset('frontend/assets/images/Group 125.png') }}" alt=""
                                                class="d-inline-block contact_img">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-10">
                                        <div class="contact_address px-3 pt-3">
                                            <h4>Follow us on</h4>
                                            <div class="col-md-12">
                                                <div class="row justify-content-center align-items-center g-2">
                                                    <div class="col-md-3 col-3">
                                                        <img src="{{ asset('frontend/assets/images/Vector (2).png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-3 col-3">
                                                        <img src="{{ asset('frontend/assets/images/Vector (1).png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-3 col-3">
                                                        <img src="{{ asset('frontend/assets/images/Vector.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="col-md-3 col-3">
                                                        <img src="{{ asset('frontend/assets/images/Vector (3).png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 pt-lg-0 pt-md-3 pt-3 px-4 px-md-4 px-lg-0">
                    <div class="contact_form">
                        <h1 class="text-center">Let’s Talk</h1>
                        <h2 class="text-center">You are quite important to us . We reply as soon as possible</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6 py-md-3 py-0">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 py-md-3 py-0">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" id="location" class="form-control" placeholder="Location">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" class="form-control" id="message" placeholder="Message" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="form-group">
                                    <button class="form-conrtol submit_buttton">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- contact info end --}}
    @push('customJs')
    @endpush
@endsection
