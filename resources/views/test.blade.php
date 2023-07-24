@extends('frontend.layouts.app')

@section('main')
    <style>
        .mask1 {
            -webkit-mask-image: linear-gradient(to right, black 50% , transparent 50%);
            mask-image: linear-gradient(to right, black 50%, transparent 50%);
        }
    </style>
    <section class="my-5 container">
        <span class="fas fa-star text-warning fs-3 mask1"></span>
    </section>
@endsection
