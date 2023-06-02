@extends('frontend.layouts.app')

@section('main')
    @php
        $banners = getRecords('banners');
    @endphp
    <x-frontend.hero-section :banners="$banners" />

    <div id="browse_section">
        <div class="container">
            <div class="d-flex align-items-center">
                <h2 class="browse_header">Browse Experts</h2>

                <hr class="line" style="width:80%">
                <div class="circle_left"></div>
                <div class="circle_right"></div>
            </div>
            <div class="row">

                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </div>
@endsection
