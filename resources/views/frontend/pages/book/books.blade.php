@php
    $banners = getRecords('banners');
    $testimonials = getRecords('testimonials');
    $books = getRecords('books');
    
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <div class="row">
        <div class="col-md-3">
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

                    <div class="filter-group my-2" data-group-type="status">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <section class="py-12 py-sm-24 py-md-32 my-5">
                <div class="container">
                    @foreach ($bookCategories as $category)
                        <div class="mx-auto">
                            <h2 class="my-3" style="font-size:30px;font-weight:600;">{{ $category->name }}</h2>
                            <div class="row">
                                @forelse ($category->booksWithRatings as $book)
                                    <div class="col-lg-4 col-md-6 mb-3">
                                        <a href="{{ route('books.show', $book->id) }}">
                                            <div>
                                                <div
                                                    class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                                    <img src="{{ useImage($book->thumbnail) }}" alt="{{ $book->title }}"
                                                        style="object-fit: cover; width: 100%" />
        
                                                    <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                                        <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                                            <b>{{ $book->title }}</b>
                                                        </h4>
                                                        <p class="text-center text-dark mt-3"
                                                            style="font-size: 13px;
                                            line-height: 16px;">
                                                            {!! str($book->description)->limit(100, '<span class="text-danger font-20 fw-bold">...</span>') !!}
                                                        </p>
                                                    </div>
                                                    <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                                        style='
                                            background: rgba(14, 14, 14, 0.758);  /* fallback for old browsers */
                                            background: -webkit-linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758);  /* Chrome 10-25, Safari 5.1-6 */
                                            background: linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758) /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                            '>
                                                        <x-avg-review-stars :avg="$book->reviews_avg_rating" class="text-white" />
                                                        <p class="mb-0 text-white fw-mideum"> {{ $book->price }} <span
                                                                class="mdi mdi-currency-bdt font-16"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="bg-light text-center p-3 d-flex align-items-center justify-content-center">
                                        No Books found in this category
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>



    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection
