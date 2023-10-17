@extends('frontend.layouts.app')
@section('main')
    <section class="py-3 px-3" style="background: var(--bs-gray-100);">
        <div class="container shadow p-3 rounded-3 bg-white mt-5">
            <div class="row align-items-start">
                <div class="col-md-3 mb-3 mb-md-0">
                    <img loading="lazy" class="rounded-3 w-100" src="{{ useImage($expert->image) }}" alt="{{ $expert->name }}"
                        style="aspect-ratio:1/1; object-fit:cover;">
                </div>
                <div class="col-md-9">
                    <h2><b>{{ $expert->name }}</b></h2>
                    <p class="m-0 text-muted">{{ $expert->post }}</p>
                    <p class="mt-3">
                        {!! $expert->bio !!}
                    </p>
                    <a class="btn btn-primary " href="#">Consult Now</a>
                </div>

            </div>
            <div class="expert-details clearfix mt-4">
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h4 class="text-muted mb-3">Total Experience</h4>
                    <h5>{{ $expert->experience }} Years</h5>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h4 class="text-muted mb-3">Joined In</h4>
                    <h5>{{ Carbon\Carbon::parse($expert->join_date)->format('d M, Y') }}</h5>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h4 class="text-muted mb-3">Total Ratings({{ $expert->reviews_count }})</h4>
                    <div class="rating">
                        @isset($expert->reviews_avg_rating)
                            <h5>
                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                {{ round($expert->reviews_avg_rating, 1) }}
                            </h5>
                        @endisset
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#info" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        Info
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#reviews" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                        Reviews
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="info">
                    <div class="container my-3">
                        <div class="row">
                            <div class="col-lg-6 p-0 mb-3 mb-lg-0">
                                <div class="border p-3 rounded-3 bg-white w-100 h-100">
                                    <h4><b>{{ $expert->name }}</b></h4>
                                    <div>
                                        {!! $expert->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-0 ps-lg-3">
                                <div class="w-100 h-100">
                                    <div class="border p-3 rounded-3 bg-white mb-3">
                                        <h4><b>Availability</b></h4>
                                        <div class="border-start border-3 ps-2">
                                            <span style="font-weight: 500;">{{ $expert->availability }}</span>
                                        </div>
                                    </div>
                                    <div class="border p-3 rounded-3 bg-white">
                                        <h4><b>At a Glance</b></h4>
                                        <div class="row mt-3 px-3">
                                            {!! $expert->at_a_glance !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="reviews">
                    <x-review-section :item="$expert" :reviews="$reviews" :slug="'expert_profile'" :can-review="$canReview" />
                </div>
            </div>

        </div>


    </section>
@endsection

@push('customJs')
    <script></script>
@endpush
