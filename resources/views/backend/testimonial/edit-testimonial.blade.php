@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Testimonial', 'Create']" />

    <x-backend.ui.section-card name="Testimonial List">
        <form action="{{ route('testimonial.update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.image-input name="image" image="{{ $testimonial->avatar }}"/>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="name" label="Name" value="{{ $testimonial->name }}"/>
                    <x-backend.form.text-input name="comment" label="Comment" value="{{ $testimonial->comment }}"/>
                    
                    <x-backend.ui.button class="btn-primary mt-2">Update</x-backend.ui.button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
