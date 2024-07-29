@php
    
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />


    {{-- show only when category is tax services --}}
    @php
        $productCat = match ($serviceCategory->name) {
            'Tax Services' => \App\Models\ProductCategory::where('name', 'Tax Packages')
                ->with(['productSubCategories', 'productSubCategories.products'])
                ->first(),
            'Vat Services' => \App\Models\ProductCategory::where('name', 'Vat Packages')
                ->with(['productSubCategories', 'productSubCategories.products'])
                ->first(),
            default => null,
        };
    @endphp
    @if ($productCat)
        <section class="mb-5">
            <div class="card-body container-fluid px-5">
                <h2 class="header-title h4 mt-4 text-center">{{ $productCat->name }}</h2>
                <div class=" d-flex justify-content-center">
                    <p class="text-justify" style="max-width: 100ch; font-weight:500;">
                        {{ $productCat->description }}</p>
                </div>
                <div class="container d-flex justify-content-center">
                    <ul class="nav nav-pills navtab-bg" role="tablist">
                        @foreach ($productCat->productSubCategories as $key => $subCat)
                            <li class="nav-item" role="presentation">
                                <a href="#{{ str($subCat->name)->slug() . '-' . $subCat->id }}" data-bs-toggle="tab"
                                    aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}" role="tab"
                                    class="text-capitalize nav-link {{ $key === 0 ? 'active' : '' }}" tabindex="-1">
                                    {{ $subCat->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="container-fluid">
                    <div class="tab-content">
                        @foreach ($productCat->productSubCategories as $key => $subCat)
                            <div class="tab-pane {{ $key === 0 ? 'active' : '' }}"
                                id="{{ str($subCat->name)->slug() . '-' . $subCat->id }}" role="tabpanel">
                                <div class="product-wrapper">
                                    @foreach ($subCat->products as $product)
                                        <x-frontend.product-card :$product />
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif


    {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{ $subCategories[0]->serviceCategory->name }}
        </h4>
        <div class="row mx-lg-5 mx-2 service-category">
            @foreach ($subCategories as $sub)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="d-flex flex-column align-items-center border rounded shadow p-2">
                        <a href="{{ route('service.sub', $sub->id) }}">
                            <img loading="lazy" style="max-width:120px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                                src="{{ useImage($sub->image) }}" alt="">
                        </a>
                        <a class="text-dark text-capitalize" href="{{ route('service.sub', $sub->id) }}">
                            <h6>{{ $sub->name }}</h6>
                        </a>
                        <a href="{{ route('service.sub', $sub->id) }}"
                            class="text-center text-muted">{!! $sub->description !!}</a>
                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <x-frontend.appointment-section :sections="$appointments" />
    <x-frontend.info-section :title="count($infos1)>0 ? $infos1[0]->title: ''" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.info-section :title="count($infos2)>0 ? $infos2[0]->title: ''" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection
