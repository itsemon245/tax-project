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
                    <div class="col-lg-5 d-flex flex-wrap">
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                        <div class="app_content_thumabil mb-3">
                            <img src="{{ asset('frontend/assets/images/Rectangle 39.png') }}" alt="">
                            <h2>Lorem Ipsum</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column align-items-center justify-content-center">
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
    </div>

    <x-frontend.testimonial-section :$testimonials>
    </x-frontend.testimonial-section>
@endsection
