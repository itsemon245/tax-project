@php
    $infos1 = getRecords('infos', ['section_id', 1]);
    $infos2 = getRecords('infos', ['section_id', 2]);
@endphp
@extends('frontend.layouts.app')
@section('main')
    <section class="py-3 px-3" style="background: var(--bs-gray-100);">
        <div class="container shadow p-3 rounded-3 bg-white">
            <div class="row">
                <div class="col-md-3">
                    <img class="rounded-4" src="{{ asset('frontend/assets/images/ps.avif') }}" alt="Expert"
                        style="width: 100%; max-height: 300px; object-fit: cover;">
                </div>
                <div class="col-md-6 p-3">
                    <h2><b>Dr. Ekramul Haque</b></h2>
                    <p class="m-0 text-muted">MBBS</p>
                    <p class="m-0 text-muted">Psychiatry Darmotology</p>
                    <p class="mt-3">
                        <small class="text-muted">Working at </small>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Ab saepe ratione alias illum soluta harum consectetur natus expedita, commodi a sed.
                        Nesciunt repellat ut neque non cumque, harum libero cupiditate?
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-center align-items-center flex-column h-100">
                        <h4><b>Consultation Fee</b></h4>
                        <p class="m-0"><span class="text-primary">$470 </span>(Including VAT)</p>
                        <p class="m-0 text-muted">Before <s>$650</s></p>
                        <a class="btn btn-primary text-capitalize mt-2" href="#">See Doctor Now</a>
                    </div>
                </div>
            </div>
            <div class="expert-details clearfix mt-4">
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Total Experience</h5>
                    <h4>15 Years</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">BMDC Number</h5>
                    <h4>8652</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Join Doctime</h5>
                    <h4>31 july 2021</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Total Ratings(888)</h5>
                    <div class="rating">
                        <h4>
                            <span class="mdi mdi-star text-warning"></span>
                            4.9
                        </h4>
                    </div>
                </div>
            </div>
            <hr class="text-dark">
            <div class="infos">
                <a href="#" class="me-3">Info</a>
                <a href="#" class="me-3">Experience</a>
                <a href="#" class="me-3">Reviews</a>
            </div>
        </div>
    </section>
@endsection

@push('customJs')
    <script></script>
@endpush
