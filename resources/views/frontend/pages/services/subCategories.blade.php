@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
    $appointments= getRecords('appointments');
    $testimonials = getRecords('testimonials');
    $banners = getRecords('banners');
    $isTaxServices = str(url()->current())->contains('service/category/1')
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    
    
    {{-- show only when category is tax services --}}
    @if ($isTaxServices)
    <x-frontend.products-section :subCategories="$productCategory->productSubCategories" />
    @endif

        {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{$subCategories[0]->serviceCategory->name}}</h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($subCategories as $sub)
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle"
                        src="{{ useImage($sub->image) }}" alt="">
                    <a href="{{route('service.sub', $sub->id)}}"><h6>{{$sub->name}}</h6></a>
                    <p class="text-center">{{$sub->description}}</p>
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