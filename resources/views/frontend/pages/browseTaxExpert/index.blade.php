@extends('frontend.layouts.app')

@section('main')
    @php
        $banners = getRecords('banners');
    @endphp
    <x-frontend.hero-section :banners="$banners" />
@endsection
