@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />
    
    {{-- Misc content --}}
    <div>
        
    </div>
    <x-frontend.appointment-section :sections="getRecords('appointments')" />
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
    <x-frontend.testimonial-section :testimonials="getRecords('testimonials')">
    </x-frontend.testimonial-section>
    
@endsection