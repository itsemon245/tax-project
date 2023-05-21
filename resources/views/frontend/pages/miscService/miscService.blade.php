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
    <div class="py-5 row px-5">
        <h3 class="text-center">Industries We Serve</h3>
        <div class="d-flex justify-content-center">
            <p class="text-justify" style="max-width:1200px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. A numquam inventore consectetur? Dolores sed at atque non repellat consequatur aperiam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab voluptas rerum tenetur dolores officia veritatis reprehenderit blanditiis earum culpa laboriosam.</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="bg-light rounddd rounded-2 p-3">
                <div class="industry-grid">
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                    <div>
                        <img style="width:48px;" src="{{asset('backend/assets/images/products/product-6.png')}}" alt="">
                        <h6>Asset Management</h6>
                        <p  class="tex-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam, repellendus?</p>
                    </div>
                   
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-secondary text-black mt-3" href="#">All Industries</a>
                </div>
            </div>
        </div>
    </div>



    {{-- Misc content --}}
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
   
@pushOnce('customCss')
    <style>
        /* .industry-grid{
            display: flex;
            flex-wrap: wrap;
            gap:1.2rem;
        }
        .industry-grid > * {
            max-width: 32%;
        } */

        .industry-grid{
            display: grid;
            grid-auto-columns: repeat(auto-fit, minmax(300px, 1fr));
        }
    </style>
@endPushOnce

@endsection