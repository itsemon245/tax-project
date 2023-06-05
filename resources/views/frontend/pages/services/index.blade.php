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
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{$services[0]->serviceSubCategory->name}}</h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($services as $service)
            <div class="col-md-4 col-lg-3 col-sm-6 mb-3">
                <div class="d-flex flex-column align-items-center border">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ useImage($service->image) }}" alt="">
                    <a class="text-black text-capitalize" href="{{route('service.view', $service->id)}}"><h6>{{$service->title}}</h6></a>
                    <p class="text-center">
                        {{$service->intro}}
                    </p>
                    
                </div>
                <div class="bg-primary px-3 d-flex align-items-center justify-content-between">
                    <div class="d-inline-flex gap-2">
                        <div class="d-inline-flex">
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                            <span class="mdi mdi-star" style="color: yellow;"></span>
                        </div>

                        <div class="d-inline-flex align-items-center">
                            <span class="mdi mdi-account"></span>
                            <span>{{$service->reviews}}</span>
                        </div>
                    </div>
                    <span style="font-weight: 500;"> Tk. {{$service->price}}/-</span>
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