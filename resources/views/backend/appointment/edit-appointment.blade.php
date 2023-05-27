@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Appointment', 'Create']" />

    <x-backend.ui.section-card name="Appointment Create">
        <form action="{{ route('appointment.update',$appointment->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.image-input name="image" image="{{ $appointment->image }}" />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="title" label="Title" value="{{ $appointment->title }}" />
                    <x-backend.form.text-input name="sub_title" label="Sub Title" value="{{ $appointment->sub_title }}" />
                    <x-backend.form.text-input name="tag" label="Tag" value="{{ $appointment->tag }}" />

                    <div class="mt-1">
                        <label for="Description" class="form-label">Description</label>
                        <textarea id="message"
                            class="form-control @error('description')
                        is-invalid
                    @enderror"
                            name="description" style="height
                        57px" placeholder="Description">{{ $appointment->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <x-backend.ui.button class="btn-primary mt-2">Update</x-backend.ui.button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
