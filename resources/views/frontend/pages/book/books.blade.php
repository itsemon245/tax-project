@php
    $banners = getRecords('banners');
@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />

    <section class="container-lg my-5">
        <div class="text-center fs-5 fw-bold text-primary my-3">Showing all books from {{ $bookCategory->name }}</div>
        <div class="row">
            @foreach ($books as $book)
                <div class="col-sm-6 col-md-4 col-lg-3 col-xxl-2 mb-3">
                    <a href="{{ route('books.show', $book->id) }}" class="h-100">
                        <div>
                            <div
                                class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                <img src="{{ useImage($book->thumbnail) }}" alt="{{ $book->title }}"
                                    style="object-fit: cover; width: 100%" />

                                <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                    <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                        <b>{{ $book->title }}</b>
                                    </h4>
                                    <p class="text-center text-dark mt-3" style="font-size: 13px; line-height: 16px;">
                                        {!! str($book->description)->limit(100, '<span class="text-danger font-20 fw-bold">...</span>') !!}
                                    </p>
                                </div>
                                <div class="mt-auto px-2 d-flex justify-content-between align-items-center py-2 w-100"
                                    style='background: rgba(14, 14, 14, 0.758);'>
                                    <x-avg-review-stars :avg="$book->reviews_avg_rating" icon-font="font-16" class="text-white" />
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
            <div class="col-12 mt-2">
                <div class="paginator float-end">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
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
