@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section />
    <x-frontend.products-section />
    <x-frontend.appointment-section />
    <x-frontend.info-section title="We Help You File Quickly And Confidently" class="">
        <x-frontend.info-card />
        <x-frontend.info-card />
        <x-frontend.info-card />
        <x-frontend.info-card />
    </x-frontend.info-section>
    <x-frontend.info-section title="Lorem ipsum dolor sit amet consectetur" class="text-danger">
        <x-frontend.info-card />
        <x-frontend.info-card />
        <x-frontend.info-card />
        <x-frontend.info-card />
    </x-frontend.info-section>
@endsection
