@php
    $banners = getRecords('banners');
    $testimonials = getRecords('testimonials');
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />

    <section class="container-lg px-2">
        <div class="d-flex center_sm mt-4 px-3">
            <h5 class="font-md-18 fw-bold">All Books</h5>
            <div class="line flex-grow-1">
                <div class="circle_left"></div>
                <div class="circle_right"></div>
            </div>
        </div>
        @foreach ($bookCategories as $category)
            <div class="card mb-5 border-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class=" fw-bold fs-5">{{ $category->name }}</div>
                        <a href="{{ route('books.view.all', $category->id) }}" role="button"
                            style="text-decoration: underline !important;"
                            class="text-dark fw-bold d-flex gap-1 align-items-center">
                            View All Books
                            <span class="mdi mdi-chevron-right"></span>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($category->booksWithRatings()->limit(6)->get() as $book)
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                                <a href="{{ route('books.show', $book->id) }}" class="h-100">
                                    <div>
                                        <div
                                            class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                            <img loading="lazy" src="{{ useImage($book->thumbnail) }}" alt="{{ $book->title }}"
                                                style="object-fit: cover; width: 100%" />

                                            <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                                <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                                    <b>{{ $book->title }}</b>
                                                </h4>
                                                <p class="text-center text-dark mt-3"
                                                    style="font-size: 13px; line-height: 16px;">
                                                    {!! str($book->description)->limit(100, '<span class="text-danger font-20 fw-bold">...</span>') !!}
                                                </p>
                                            </div>
                                            <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                                style='background: rgba(14, 14, 14, 0.758);'>
                                                {{-- <x-avg-review-stars :avg="$book->reviews_avg_rating" class="text-white" /> --}}
                                                <p class="mb-0 text-white fw-mideum">
                                                    {{ $book->price }}
                                                    <span class="mdi mdi-currency-bdt font-16"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <x-frontend.testimonial-section :testimonials="$reviews">
    </x-frontend.testimonial-section>
@endsection
@push('customJs')
    <script>
        // const headers = $('section .card-header')
        // headers.each((i, header) => {
        //     $(header).click(e => {
        //         let icon = $(header).find('.mdi');
        //         icon.toggleClass('mdi-chevron-down')
        //         icon.toggleClass('mdi-chevron-up')
        //         $(header).next().slideToggle();
        //     })
        // })
    </script>
@endpush
