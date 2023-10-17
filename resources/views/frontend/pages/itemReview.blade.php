@extends('frontend.layouts.app')

@section('main')
    <section class="container my-5">
        <h4 class="text-center mb-3">{{ str($slug)->title() }} Reviews</h4>
        <x-review-section :item="$item" :reviews="$reviews" :slug="$slug" :can-review="$canReview" />
    </section>
@endsection
