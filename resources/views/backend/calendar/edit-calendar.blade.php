@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Event', 'Edit']" />

    <x-backend.ui.section-card name="Appointment Create">
        <form action="{{ route('calendar.update', $calendar->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input name="event_name" label="Event Name" value="{{ $calendar->envent_name }}" />
                    <x-backend.form.text-input type="date" name="start_date" label="Date"
                        value="{{ $calendar->envent_start_date }}" />


                    <div class="mt-1">
                        <label for="Description" class="form-label">Event Description</label>
                        <textarea id="message"
                            class="form-control @error('event_description')
                        is-invalid
                    @enderror"
                            name="description" style="height
                        57px" placeholder="Event Description">{{ $calendar->event_description }}</textarea>
                        @error('event_description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- <x-backend.ui.button class="btn-primary mt-2">Update</x-backend.ui.button> --}}
                    <button>update</button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
