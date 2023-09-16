@extends('backend.layouts.app')


@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Event', 'List']" />

    <x-backend.ui.section-card name="All Events">
        @can('create event')
        <x-backend.ui.button type="custom" href="{{ route('calendar.create') }}"
        class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        @endcan
        <x-backend.table.basic :data="$events">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Info</th>
                    <th>Event Description</th>
                    @canany(['update event', 'delete event'])
                    <th>Action</th>
                    @endcanany
                </tr>
            </thead>

            <tbody>
                @forelse ($events as $key => $event)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="mb-0">Title: <span class="h6">{{ $event->title }}</span></p>
                            <p class="mb-0">Client: <span class="badge bg-success">{{ $event->client->name }}</span></p>
                            <p class="mb-0">Service: <span class="badge bg-blue">{{ $event->service }}</span></p>
                        </td>
                        <td>
                            <div>
                                <p class="mb-0">Note:</p>
                                <div class="text-muted">
                                    Event Note
                                </div>
                            </div>
                        </td>
                        @canany(['update event', 'delete event'])
                        <td>
                            @can('update event')
                            <x-backend.ui.button type="delete" action="{{ route('calendar.destroy', $event->id) }}"
                                class="text-capitalize btn-sm" />
                            @endcan
                            @can('delete event')
                            <x-backend.ui.button type="edit" href="{{ route('calendar.edit', $event->id) }}"
                                class="text-capitalize btn-sm" />
                            @endcan
                        </td>
                        @endcanany
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
