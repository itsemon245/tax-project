@extends('backend.layouts.app')

@section('content')

    <!-- start page title -->
    <x-backend.ui.breadcrumbs  :list="['Dashboard','Hero','Create']"/>
    <!-- end page title -->
    

    <form action="{{ route('hero.store') }}" method="post" enctype="multipart/form-data">
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
                            <div class="mt-1"><label class="labels">Title<span style="color:red;">*</span></label><input
                                    name="title" type="text"
                                    class="form-control 
                                  @error('title')
                                  is-invalid
                                  @enderror"
                                    placeholder="Title" value="">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <x-backend.from.text-input label="Sub Title" required type="text" name="sub_title">

                            </x-backend.from.text-input>

                            <div class="mt-1"><label class="labels">Button Link<span
                                        style="color:red;">*</span></label><input name="button_link" type="text"
                                    class="form-control 
                                  @error('button_link')
                                  is-invalid
                                  @enderror"
                                    placeholder="Button Link" value="">
                                @error('button_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3"><button
                                    class="btn btn-primary waves-effect waves-light profile-button">Create
                                    Hero</button></div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </form>
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
@endsection
