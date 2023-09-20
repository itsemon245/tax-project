@extends('frontend.layouts.app')
@section('main')
    @push('customCSS')
        <style>
            .yellow {
                color: yellow;
            }
        </style>
    @endpush
    <section class="py-md-5 my-5 ">
        <div class="container px-2">
            <div class="row mb-24">
                <div class="col-md-4 mb-3 mb-md-0">
                    <img loading="lazy" style="object-fit: cover;" class="rounded w-100 h-100 border"
                        src="{{ useImage($caseStudy->image) }}" alt="{{ str($caseStudy->name)->slug() }}" />
                </div>
                <div class="col-md-8">
                    <div class="w-100 h-100 p-3">
                        <div class="">
                            <h5 class="text-capitalize fs-3 mb-0">{{ $caseStudy->name }}</h5>
                            <span class="">Category: </span> <i
                                style="font-weight: 500;">{{ $caseStudy->caseStudyCategory?->name }}</i>
                            <p class="mb-3 fw-bold fs-5">
                                Price:
                                <span class="text-dark" style="font-weight: 500;">{{ $caseStudy->price }}</span>
                                @if ($caseStudy->price !== 'Free')
                                    <span class="mdi mdi-currency-bdt text-dark"></span>
                                @endif
                            </p>
                            <p class="mw-2xl mb-5">
                                {!! $caseStudy->intro !!}
                            </p>
                        </div>
                        <div class="d-flex gap-3">
                            @if ($caseStudy->price === 'Free')
                                <form action="{{ route('course.caseStudy.download', $caseStudy->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-success text-light px-3 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                        <span class="mdi mdi-download"></span>
                                        <span style="font-weight: 500;" class="text-capitalize">Download for free</span>
                                    </button>
                                </form>
                            @else
                                <x-backend.ui.button type="custom" :href="route('payment.create', ['model' => 'CaseStudy', 'id' => $caseStudy->id])"
                                    class="btn-success text-light px-3 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                    <span class="mdi mdi-cart-outline"></span>
                                    <span style="font-weight: 500;">Buy Now</span>
                                </x-backend.ui.button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="p-3 mt-3">
                    <h5>Description:</h5>
                    <div class="text-muted">
                        {!! $caseStudy->description !!}
                    </div>
                </div>
            </div>

            {{-- <div class="mt-3">
                <x-review-section :item="$book" :reviews="$reviews" :slug="'book'"/>
            </div> --}}


        </div>
    </section>
@endsection
