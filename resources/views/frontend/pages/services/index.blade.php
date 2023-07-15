@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
    $appointments = getRecords('appointments');
    $testimonials = getRecords('testimonials');
    $banners = getRecords('banners');
    
@endphp
@extends('frontend.layouts.app')

@pushOnce('customCss')
    <style>
        .custom-grid {
            display: grid;
            grid-template-columns: max-content max-content;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endPushOnce
@section('main')
    <x-frontend.hero-section :banners="$banners" />

    {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{ $services[0]->serviceSubCategory->name }}
        </h4>
        <div class="row justify-content-center px-3">
            @foreach ($services as $service)
                <div class="col-sm-6 col-md-4 col-xl-3 mb-3">
                    <div class="w-100 h-100">
                        <div class="d-flex flex-column align-items-center border p-3">
                            <a href="{{ route('service.view', $service->id) }}">
                                <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                                    src="{{ useImage($service->image) }}" alt="">
                            </a>
                            <a class="text-dark text-capitalize" href="{{ route('service.view', $service->id) }}">
                                <h6>{{ $service->title }}</h6>
                            </a>
                            <a href="{{ route('service.view', $service->id) }}" class="text-center text-muted">
                                {{ $service->intro }}
                            </a>

                        </div>
                        <div class="bg-primary p-2 custom-grid">

                            <a href="{{ route('review.item', ['service', $service->id]) }}" class="mb-1">
                                <x-avg-review-stars :avg="$service->reviews_avg_rating" />
                            </a>

                            <strong>Price </strong>

                            <a href="{{ route('review.item', ['service', $service->id]) }}"
                                class="d-inline-flex align-items-center text-dark">
                                <span class="mdi mdi-account"></span>
                                <span>{{ $service->reviews_count }} Reviews</span>
                            </a>

                            <span style="font-weight: 500;">{{ $service->price }} Tk</span>
                        </div>
                    </div>
                </div>
            @endforeach
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
