@php
    $banners = getRecords('banners');
    $partners = getRecords('partner_sections');
@endphp
@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <div class="container">
        {{-- About us section --}}
        <section class="my-5">
            <h3 class="text-center my-3">About Us</h3>
            <div class="">
                <div class="bg-secondary p-3 rounded">
                    <p class="d-flex justify-content-left p-3">{!! $about->description ?? '<p class="text-center pb-3">No Data</p>' !!}</p>
                </div>
            </div>
        </section>



        {{-- Sections --}}
        <div class=" justify-content-center">
            <div>
                <div class="mx-5 my-5">
                    <div class="row justify-content-center">
                        @foreach ($about->sections as $section)
                            {{-- Sections --}}
                            <div class="row mb-4 justify-content-sm-center gap-sm-3">
                                <h4 class="col-sm-12 col-5 p-0">{{ $section['title'] }}</h4>
                                <div class="col-sm-3 col-6 mb-3 mb-sm-0 p-0 flex-grow-1">
                                    @isset($section['image'])
                                        <img loading="lazy" class="w-100 rounded" src="{{ useImage($section['image']) }}"
                                            alt="" />
                                    @endisset
                                </div>
                                <div class="col-sm-8 p-4 bg-secondary rounded">
                                    <p>
                                        {!! $section['description'] !!}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- Lets discuss --}}
        <x-section.discuss-section />
        {{-- Appoinment Section --}}
        <div>
            <x-frontend.appointment-section />
        </div>
    </div>
    <x-frontend.partner-section :partners="$partners" />

    {{-- About us content --}}
@endsection
