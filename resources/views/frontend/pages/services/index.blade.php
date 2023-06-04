@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
    $appointments= getRecords('appointments');
    $testimonials = getRecords('testimonials');
    $banners = getRecords('banners');
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />

        {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">Services</h4>
        <div class="row mx-lg-5 mx-2">
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ asset('frontend/assets/images/attached-files/img-2.jpg') }}" alt="">
                    <h6>Summary</h6>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui
                        repellat ullam explicabo!</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ asset('frontend/assets/images/attached-files/img-2.jpg') }}" alt="">
                    <h6>Summary</h6>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui
                        repellat ullam explicabo!</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ asset('frontend/assets/images/attached-files/img-2.jpg') }}" alt="">
                    <h6>Summary</h6>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui
                        repellat ullam explicabo!</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ asset('frontend/assets/images/attached-files/img-2.jpg') }}" alt="">
                    <h6>Summary</h6>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui
                        repellat ullam explicabo!</p>
                </div>
            </div>
        </div>
    </section>
    <x-frontend.appointment-section :sections="$appointments" />
    <x-frontend.info-section :title="$infos1[0]->title" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
    
@endsection