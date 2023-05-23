@php
$infos1 = getRecords('infos', ['section_id', 1]);
$infos2 = getRecords('infos', ['section_id', 2]);
$banners = getRecords('banners');
$appointments = getRecords('appointments');
$testimonials = getRecords('testimonials');
@endphp
@extends('frontend.layouts.app')
@section('main')
<x-frontend.hero-section :banners="$banners" />

{{-- industries section  --}}
<x-frontend.industries-section />

{{-- Misc Services --}}
<section class="px-lg-5 px-2 my-5">
    <div class="row mx-lg-5 mx-2">
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex flex-column align-items-center">
                <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <h6>Summary</h6>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui repellat ullam explicabo!</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex flex-column align-items-center">
                <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <h6>Summary</h6>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui repellat ullam explicabo!</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex flex-column align-items-center">
                <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <h6>Summary</h6>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui repellat ullam explicabo!</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex flex-column align-items-center">
                <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <h6>Summary</h6>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic fuga nam qui repellat ullam explicabo!</p>
            </div>
        </div>
    </div>
</section>
<section class="px-lg-5 px-2 my-5">
    <div class="row mx-lg-5 mx-2">
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex justify-content-around align-items-center">
                <img style="width:120px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="counter-up m-0" style="font-size: 46px; color: #1abcfe; font-weight: 700;">100</h2>
                    <p class="m-0" style="font-size: 16px;"><b>Users</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex justify-content-around align-items-center">
                <img style="width:120px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="counter-up m-0" style="font-size: 46px; color: #1abcfe; font-weight: 700;">100</h2>
                    <p class="m-0" style="font-size: 16px;"><b>Users</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex justify-content-around align-items-center">
                <img style="width:120px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="counter-up m-0" style="font-size: 46px; color: #1abcfe; font-weight: 700;">100</h2>
                    <p class="m-0" style="font-size: 16px;"><b>Users</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6">
            <div class="d-flex justify-content-around align-items-center">
                <img style="width:120px;aspect-ratio:1/1;" class="rounded rounded-circle" src="{{asset('frontend/assets/images/attached-files/img-2.jpg')}}" alt="">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h2 class="counter-up m-0" style="font-size: 46px; color: #1abcfe; font-weight: 700;">100</h2>
                    <p class="m-0" style="font-size: 16px;"><b>Users</b></p>
                </div>
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

@push('customJs')
    <script>
        $('.counter-up').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
@endpush