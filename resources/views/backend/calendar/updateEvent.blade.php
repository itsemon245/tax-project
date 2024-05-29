
@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Event', 'Update']" />

    <!-- Modal for updating event -->
    
    <div class="modal fade show" id="eventUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            <form action="{{route('calendar.update', $calendar->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="">
                    <h4 class="text-center my-3" id="exampleModalLabel">Update Event</h4>
                </div>

                <div class="modal-body px-3">
                    <x-backend.form.text-input id="eventTitle" name="event_name" value="{{$calendar->title}}" label="Event Name" />
                    <x-backend.form.select-input id="service" label="Services" name="service"
                        placeholder="Select Service">
                        @foreach ($services as $service)
                            <option value="{{ $service }}" @if ($service===$calendar->service)
                                selected
                            @endif
                            >{{ $service }}</option>
                        @endforeach
                    </x-backend.form.select-input>
                    <x-backend.form.select-input id="client" label="Client" name="client"
                        placeholder="Select Client">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"  @if ($client->id == $calendar->client_id)
                                selected
                            @endif
                            >{{ $client->name }}</option>
                        @endforeach
                    </x-backend.form.select-input>
                    <x-backend.form.text-input type="datetime-local" name="start_date" id="start-date"
                        label="Start Date" value="{{$calendar->start}}" />
                    <x-backend.form.text-input id="description" name="event_description"
                        label="Event Description" value="{{$calendar->description}}" />
                </div>
                <div class="modal-footer">
                    <x-backend.ui.button type="custom" href="{{route('calendar.index')}}" class="btn-secondary text-capitalize">Go Back</x-backend.ui.button>
                    <button class="btn btn-primary">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('customJs')
    <script></script>
@endpush
@endsection
