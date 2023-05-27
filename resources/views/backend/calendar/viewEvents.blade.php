@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Event', 'List']" />

    <x-backend.ui.section-card name="All Events">

        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Info</th>
                    <th>Event Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
                @forelse ($events as $key => $event)
                <tr>
                    <td>{{++$key}}</td>
                    <td><p class="mb-0">Title: <span class="h6">{{$event->title}}</span></p>
                        <p class="mb-0">Client: <span class="badge bg-success">{{$event->client->name}}</span></p>
                        <p class="mb-0">Service: <span class="badge bg-blue">{{$event->service}}</span></p></td>
                    <td>
                        <div>
                            <p class="mb-0">Note:</p>
                            <div class="text-muted">
                                Event Note
                            </div>
                        </div>
                    </td>
                    <td>
                        <x-backend.ui.button type="delete" action="{{route('calendar.destroy', $event->id)}}" class="text-capitalize btn-sm" />
                        <x-backend.ui.button type="edit" href="{{route('calendar.edit', $event->id)}}" class="text-capitalize btn-sm" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center bg-light text-dark">No events created yet</td>
                </tr>
                @endforelse
            </tbody>
        </x-backend.table.basic>


    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection