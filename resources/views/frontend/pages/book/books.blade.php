@php
    // $infos1 = getRecords('infos', ['section_id', 1]);
    // $infos2 = getRecords('infos', ['section_id', 2]);
    $banners = getRecords('banners');
    // $appointments = getRecords('appointments');
    $testimonials = getRecords('testimonials');

@endphp
@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
{{ dd($users[0]->promo_codes) }}
    <section class="py-12 py-sm-24 py-md-32 my-5">
        <div class="container">
            <div class="mx-auto">
                <h2 class="my-3" style="font-size:30px;font-weight:600;">Category-A</h2>
                <div class="row">
                    @foreach ($books as $book)
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('books.show', $book->id) }}">
                            <div>
                                <div
                                    class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                    <img src="https://picsum.photos/seed/random/300" alt=""
                                        style="object-fit: cover; width: 100%" />

                                    <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                        <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                            <b>Leslie Alexander</b>&nbsp
                                            <span class="text-danger" style="font-size: 13px">40% off</span>
                                        </h4>
                                        <p class="text-center text-dark mt-3"
                                            style="font-size: 13px;
                                    line-height: 16px;">
                                            Lorem ipsum dolor sit
                                            amet
                                            consectetur, adipisicing
                                            elit. Molestiae provident
                                            inventore aliquam perspiciatis amet! Vel delectus ad suscipit veniam natus!</p>
                                    </div>
                                    <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='
                                    background: rgba(14, 14, 14, 0.758);  /* fallback for old browsers */
                                    background: -webkit-linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758);  /* Chrome 10-25, Safari 5.1-6 */
                                    background: linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758) /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                    '>
                                        <p class="text-muted float-start m-0">
                                            <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                            <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                            <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                            <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                            <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                        </p>
                                        <p class="text-end text-light m-0" style="font-size: 13px;">
                                            TK.150/-</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection
