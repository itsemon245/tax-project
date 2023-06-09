@extends('frontend.layouts.app')

@section('main')
    @php
        $banners = getRecords('banners');
        $testimonials = getRecords('testimonials');
    @endphp
    <x-frontend.hero-section :banners="$banners" />

    <div id="browse_section">
        <div class="container">
            <div class="d-flex center_sm">
                <h2 class="browse_header">Browse Experts</h2>
                <div class="line">
                    <div class="circle_left"></div>
                    <div class="circle_right"></div>
                </div>

            </div>
            <div class="row">

                <div class="col-lg-12">
                    <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="active tabs" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Company</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="tabs" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                type="button" role="tab" aria-controls="profile" aria-selected="false">Company</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="tabs" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                type="button" role="tab" aria-controls="contact" aria-selected="false">Company</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="tabs" id="company-tab" data-bs-toggle="tab" data-bs-target="#company"
                                type="button" role="tab" aria-controls="company" aria-selected="false">Company</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                            <div class="row">
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4 col-md-6">
                                    <div class="browse_content_wrapper">
                                        <div class="d-flex">
                                            <div class="col-lg-5">
                                                <img src="{{ asset('frontend/assets/images/Plugin icon - 1.png') }}"
                                                    alt="" class="browse_thumbail">
                                                <div class="rating text-center">
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="mdi mdi-star rating"></span>
                                                    <span class="browse_ratings">
                                                        4.3 ratings
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <h2 class="browse_card_name">Ms. Marry Jane</h2>
                                                <button class="browse_card_button">Tax Expert</button>
                                                <h4 class="browse_card_exp">Experience: 10 years</h4>
                                                <h5 class="browse_card_company">Business, Individual,Company</h5>
                                                <p class="browse_card_price">Fee: 500/-</p>
                                            </div>
                                        </div>
                                        <div class="profile text-center">
                                            <button class="browse_card_cons">
                                                Consultation
                                            </button>
                                            <a href="{{route('expert.profile')}}" class="browse_card_view">View Profile</a>
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

    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection
