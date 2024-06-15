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
                    <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2">
                        @forelse ($category->booksWithRatings()->limit(6)->get() as $book)
                            <a class="rounded border-2 overflow-hidden" href="{{ route('books.show', $book->id) }}"
                                class="">
                                <img class="rounded-t-2 w-full h-[320px] object-cover"
                                    src="{{ useImage($book->thumbnail) }}" alt="{{ $book->title }}">
                                <div class="bg-white rounded-b-2">
                                    <h4 class="text-lg font-medium tracking-wider my-3 text-black text-center">
                                        {{ $book->title }}</h4>
                                    <p class="text-center text-dark" style="font-size: 13px; line-height: 16px;">
                                        {!! str($book->description)->limit(100, '<span class="text-danger font-20 fw-bold">...</span>') !!}
                                    </p>
                                    <div class="mt-auto px-2 d-flex justify-content-between align-items-center py-2 w-100"
                                        style='background: rgba(14, 14, 14, 0.758);'>
                                        <x-avg-review-stars :avg="$book->reviews_avg_rating" icon-font="font-16" class="text-white" />
                                        <p class="mb-0 text-white fw-mideum">
                                            {{ $book->price }}
                                            <span class="mdi mdi-currency-bdt font-16"></span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="col-span-full">
                                <div class="bg-light text-center">
                                    <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                                        No Books Found!
                                    </div>
                                </div>
                            </div>
                        @endforelse
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
