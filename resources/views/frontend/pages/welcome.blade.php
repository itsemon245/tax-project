@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section />
    <x-frontend.products-section>
        <x-frontend.product.card />
    </x-frontend.products-section>
@endsection
