@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Hero', 'Create']" />

    <x-backend.ui.section-card name="Create Hero">
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="hero_image"  />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Title" type="text" name="title" />

                    <x-backend.form.text-input label="Sub Title" type="text" name="sub_title" />

                    <x-backend.form.text-input label="Button Link" type="text" name="button_link" />

                    <x-backend.ui.button class="btn-primary">Create</x-backend.ui.button>

                </div>

            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
