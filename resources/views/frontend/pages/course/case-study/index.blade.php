@extends('frontend.layouts.app')
@section('main')
    <section class="my-3 mx-xl-5 mx-lg-3 p-2">
        @if (count(request()->query()) > 0)
            <div class="d-flex justify-content-center align-items-center gap-3 p-2 my-2">
                <h5 class="mb-0 text-warning"><span class="mdi mdi-alert-outline text-warning font-18"></span>
                    Filters Applied</h5>
                <x-backend.ui.button type="custom" :href="route('course.caseStudy.index', $caseStudyPackage->id)" class="btn-sm btn-outline-danger text-bold">
                    <span class="mdi mdi-close font-14"></span>
                    Clear Filters</x-backend.ui.button>
            </div>
        @else
            <div class="text-center fs-4 fw-medium text-dark my-3">Showing all case studies from
                {{ $caseStudyPackage->name }} Package</div>
        @endif
        <div class="row">
            <div class="col-12">
                <button onclick="filter.clickHandler(event)" id="filter-menu-btn" data-target="#filter-menu"
                    class="btn btn-secondary text-dark rounded-1 d-lg-none mb-3 fw-medium waves-effect waves-dark">
                    <span class="mdi mdi-filter font-14"></span>
                    Filter
                </button>
            </div>
            <div id="filter-menu" class="col-lg-3 d-none d-lg-block ">
                <form action="{{ route('course.caseStudy.index', $caseStudyPackage->id) }}" method="get">
                    <div class="filter-menu p-3 shadow bg-light rounded-2 ">
                        <div class="filters">
                            <x-range-slider class="" tooltips="false" name="price" id="price" :from="$minPrice"
                                :to="$maxPrice" :min-value="request()->query('price_from')" :max-value="request()->query('price_to')" step='1' icon="Yrs"
                                :is-dropdown="true"></x-range-slider>

                            <div class="card">
                                <div class="card-header py-1" role="button">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="">Categories</div>
                                        <span class="mdi mdi-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @php
                                        $catCollection = collect(request()->query('categories'));
                                    @endphp
                                    @foreach ($categories as $category)
                                        <label class="filter form-check-label" for="{{ str($category->name)->slug() }}">
                                            <input type="checkbox" class="form-check-input" name="categories[]"
                                                value="{{ $category->id }}" id="{{ str($category->name)->slug() }}"
                                                @checked($catCollection->contains(fn($val) => $val == $category->id)) />
                                            <span class="ms-3">{{ $category->name }}</span>
                                        </label>
                                        <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex gap-3 justify-content-center mt-3">
                                <x-backend.ui.button type="custom" :href="route('course.caseStudy.index', $caseStudyPackage->id)"
                                    class="btn-outline-primary mb-0">Clear</x-backend.ui.button>
                                <x-backend.ui.button class="btn-primary">Apply</x-backend.ui.button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @forelse ($caseStudies as $caseStudy)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xxl-3 mb-3">
                            <div class="h-100">
                                <div class="d-flex flex-column justify-content-between border border-2 rounded"
                                    style="overflow:hidden;">
                                    <a href="{{ route('course.caseStudy.show', $caseStudy->id) }}" class="h-100">

                                        <div class="px flex-grow-1">
                                            <img loading="lazy" src="{{ useImage($caseStudy->image) }}" class="mb-2"
                                                style="max-width:100%;" alt="{{ $caseStudy->name }}">
                                            <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                                <b>{{ $caseStudy->name }}</b>
                                            </h4>
                                            <p class="text-center text-dark p-2 " style="font-size: 13px;">
                                                {{ $caseStudy->intro }}</p>
                                        </div>
                                    </a>

                                    <div class="border-bottom border-dark mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <form action="{{ route('course.caseStudy.like', $caseStudy->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-transparent border-0 p-0">
                                                    <span class="like-btn mdi mdi-thumb-up-outline text-white"
                                                        role="button"></span>
                                                </button>
                                            </form>
                                            <span>{{ $caseStudy->likes }}</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <span>{{ $caseStudy->downloads }}</span>
                                            <span class="mdi mdi-download" role="button"></span>
                                        </div>
                                    </div>
                                    <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <x-avg-review-stars :avg="0" class="text-white" />
                                        <p class="text-end text-light m-0" style="font-size: 13px;">
                                            @if ($caseStudy->price !== 'Free')
                                                <span class="fw-medium font-16">{{ $caseStudy->price }} </span> <span
                                                    class="mdi mdi-currency-bdt font-20"></span>
                                            @else
                                                <span class="fw-medium font-16 text-success">{{ $caseStudy->price }}
                                                </span>
                                            @endif

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="bg-light text-center">
                                <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                                    No Studies Found!
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <div class="col-12 mt-2">
                        <div class="paginator float-end">
                            {{ $caseStudies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@pushOnce('customJs')
    <script src="{{ asset('frontend/filter.js') }}"></script>
@endPushOnce
@push('customJs')
    <script>
        $(document).ready(function() {
            $('.like-btn').each((i, btn) => {
                $(btn).click(function(e) {
                    let count = parseInt($(this).next().text())
                    $(this)
                        .toggleClass('mdi-thumb-up-outline')
                        .toggleClass('mdi-thumb-up text-primary')

                    if ($(this).hasClass('mdi-thumb-up text-primary')) {
                        $(this).next().text(count + 1)
                    } else {
                        $(this).next().text(count - 1)
                    }
                })
            })

        });
    </script>
@endpush
