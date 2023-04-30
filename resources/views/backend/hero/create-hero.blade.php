@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Create']" />
    <!-- end page title -->


    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                                    src="{{ asset('images/Placeholder_view_vector.svg.png') }}">
                            </label>
                            @error('hero_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Title" type="text" name="title" />

                            <x-backend.form.text-input label="Sub Title" type="text" name="sub_title" />

                            <x-backend.form.text-input label="Button Link" type="text" name="button_link" />

                            <x-backend.ui.button class="btn-primary">Create</x-backend.ui.button>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </form>
    
@endsection
