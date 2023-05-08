@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Testimonial', 'Create']" />

    <x-backend.ui.section-card name="Testimonial List">
        <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.image-input name="image" />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="name" label="Name" />
                    <x-backend.form.text-input name="comment" label="Comment" />

                    <x-backend.ui.button class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
