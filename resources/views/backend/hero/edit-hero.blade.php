@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Edit']" />
    <!-- end page title -->

    <form action="{{ route('hero.update',$hero->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container rounded bg-white py-3 px-4">
            <h4 class="my-3 text-center">Hero Section</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-6 mt-3">
                            <label for="imagefile">
                                <input name="hero_image" type="file"
                                    class="form-control d-none 
                                    @error('hero_image')
                                    is-invalid
                                    @enderror"
                                    id="imagefile">
                                <img class="w-100 border border-2 border-primary" id="liveImage"
                                    src="{{ $hero->image_url ? useImage($hero->image_url) : asset('images/Placeholder_view_vector.svg.png') }}">
                            </label>
                            @error('hero_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <x-backend.from.text-input label="Title" type="text" name="title" value="{{ $hero->title }}"/>

                            <x-backend.from.text-input label="Sub Title" type="text" name="sub_title" value="{{ $hero->sub_title }}"/>

                            <x-backend.from.text-input label="Button Link" type="text" name="button_link" value="{{ $hero->button }}"/>

                            <x-backend.ui.button name="update hero" className="btn-info" />

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
@endsection
