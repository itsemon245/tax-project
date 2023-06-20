@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
    $appointments= getRecords('appointments');
    $testimonials = getRecords('testimonials');
    $banners = getRecords('banners');
@endphp
@extends('frontend.layouts.app')

@pushOnce('customCss')
    <style>
        .custom-grid {
            display: grid;
            max-width: 100%;
            width: 100%;
            grid-template-columns: repeat(auto-fit, minmax(205px, 1fr));
            justify-content: center;
            align-items: center;
        }
        
    </style>
@endPushOnce
@section('main')
    <x-frontend.hero-section :banners="$banners" />

        {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{$services[0]->serviceSubCategory->name}}</h4>
        <div class="custom-grid px-3 gap-3">
            @foreach ($services as $service)
            <div class="shadow">
                <div class="d-flex flex-column align-items-center border p-3">
                    <a href="{{route('service.view', $service->id)}}">
                        <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                            src="{{ useImage($service->image) }}" alt="">
                    </a>
                    <a class="text-dark text-capitalize" href="{{route('service.view', $service->id)}}"><h6>{{$service->title}}</h6></a>
                    <a href="{{route('service.view', $service->id)}}" class="text-center text-muted">
                        {{$service->intro}}
                    </a>
                    
                </div>
                <div class="bg-primary px-3 d-flex align-items-center justify-content-between">
                    <div class="d-inline-flex flex-column">
                        <div class="d-inline-flex">
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                        </div>

                        <div class="d-inline-flex align-items-center" style="margin-top: -0.8rem;">
                            <span class="mdi mdi-account"></span>
                            <span>{{$service->reviews}}</span>
                        </div>
                    </div>
                    <div class="d-inline-flex flex-column" style="margin-top: -0.5rem;">
                        <strong>Price </strong>
                        <span style="font-weight: 500;">{{$service->price}} Tk</span>
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