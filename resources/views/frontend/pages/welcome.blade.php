@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <x-frontend.products-section />
    <x-frontend.appointment-section :sections="$appointmentSections" />
    <x-frontend.info-section :title="$infos1[0]->title" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :info="$info" />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :info="$info" />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.testimonial-section>
    </x-frontend.testimonial-section>

    @push('footer')
        <x-frontend.layouts.footer :socials="$socials" />
    @endpush
@endsection
