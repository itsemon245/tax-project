@extends('frontend.layouts.app')
@section('main')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>
                {{ $packages[0]->title }}
            </h3>
            <div class="mt-3 mb-3">
                {!! $packages[0]->page_description !!}
            </div>
        </div>
        <div class="col-md-4 ">
            <div class=" card overflow-hidden">
                <img class="shadow-lg" src="{{ useImage($packages[0]->page_image) }}" alt="" width="100%" height="300px">
            </div>
        </div>
    </div>
</div>
<h3 class="text-center mt-5">Case Study Lab</h3>
<div class="row">
    <div class="col-md-3 mt-3">
        <div class="filter-menu p-3 shadow bg-light rounded-2 ">
            <div class="filters">
                <div class="price-filter my-2">
                    <div class="label mb-2">
                        <span>Price</span>
                    </div>
                    <div class="range-input d-flex w-100 justify-content-between" id="price-range-input">
                        <div class="field w-100 d-flex align-items-center">
                            <span>Min</span>
                            <input type="number" class="form-control input-min ms-2" data-key="input-min"
                                value="0">
                        </div>
                        <div class="field w-100 d-flex align-items-center ms-1">
                            <span>Max</span>
                            <input type="number" class="form-control input-max ms-2" data-key="input-max"
                                value="100000">
                        </div>
                    </div>
                    <div class="range-slider mt-3" id="price-range-slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-slider-input position-relative" id="price-range-slider-input">
                        <input type="range" name="minPrice" class="range-min" min="0" max="100000"
                            value="0">
                        <input type="range" name="minPrice" class="range-max" min="0" max="100000"
                            value="100000">
                    </div>
                </div>

                {{-- <div class="filter-group my-2" data-group-type="status">
                    <div class="label mb-2">
                        <span>Categories</span>
                    </div>
                    <div class="items">
                        @foreach ($bookCategories as $bookCategory)
                        <label class="filter form-check-label" for="{{Str::slug($bookCategory->name , '-')}}">
                            <input type="checkbox" class="form-check-input" name="status" value="{{ $bookCategory->id}}" id="{{Str::slug($bookCategory->name , '-')}}"/>
                            <span class="ms-3">{{ $bookCategory->name }}</span>
                        </label>
                        <br>
                        @endforeach
                    </div>
                </div>
                <div class="filter-group my-2" data-group-type="status">
                    <div class="label mb-2">
                        <span>Author</span>
                    </div>
                    <div class="items">
                        @foreach ($books as $book)
                        <label class="filter form-check-label" for="{{Str::slug($book->author , '-')}}">
                            <input type="checkbox" class="form-check-input" name="status" value="{{ $book->id }}" id="{{Str::slug($book->author , '-')}}">
                            <span class="ms-3">{{ $book->author }}</span>
                        </label>
                        <br>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="mt-3 d-flex flex-wrap gap-3 justify-content-center">
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4">
                        <div class="px-2 py-2 mb-3 card">
                            <div class="card-body">
                                <h3>{{ $package->name }}</h3>
                                <h3>{{ $package->price }} &#2547; <span>{{ $package->billing_type }}</span></h3>
                                <small class="badge p-1 bg-success" style="font-weight: 500;">Monthly {{ $package->limit }}
                                    Orders
                                    Upload</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="bg-primary text-black p-2 text-center"
                                        href="{{ route('payment.create', ['model' => CaseStudyPackage::class, 'id' => $package->id]) }}">Choose</a>
                                </div>
                                <p class="mt-3 fw-bold">What your will get: <small
                                        class="bg-primary text-white p-1 rounded">Monthly {{ $package->limit }} Orders
                                        Upload</small></p>
                                <div>
                                    <ul class="px-3" style="list-style: decimal;">
                                        @foreach ($package->caseStudyCategories as $category)
                                            <li class="row justify-content-between mb-1">
                                                <span class="col-10">{{ $category->name }}</span>
                                                <div class="col-2">
                                                    <span class="badge bg-light p-2 text-dark w-100"
                                                        style="font-weight: 500;">{{ $category->caseStudies()->count() }}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
