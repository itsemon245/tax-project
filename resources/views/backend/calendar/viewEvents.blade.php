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

    <x-backend.ui.section-card
        name="{{ empty(request()->query('status')) ? 'All' : str(request()->query('status'))->title()->toString() }} Events">
        @can('create event')
            <x-backend.ui.button type="custom" href="{{ route('calendar.create') }}"
                class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        @endcan
        <x-backend.table.basic :items="$events">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Info</th>
                    <th>Event Description</th>
                    <th>Rejected Date</th>
                    <th>Completed Date</th>
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
                            @if ($event->client)
                                <p class="mb-0">Client: <span class="badge bg-success">{{ $event->client?->name }}</span>
                                </p>
                            @endif
                            <p class="mb-0">Service: <span class="badge bg-blue">{{ $event->service }}</span></p>
                        </td>
                        <td>
                            <div>
                                <p class="mb-0">Note:</p>
                                <div class="text-muted">
                                    {!! $event->description !!}
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $event->rejected_at?->format('F d, Y') ?? 'Not Rejected Yet' }}
                        </td>
                        <td>
                            {{ $event->completed_at?->format('F d, Y') ?? 'Not Completed Yet' }}
                        </td>
                        @canany(['update event', 'delete event'])
                            <td>
                                <div class="d-flex gap-1 align-items-center">
                                    @can('update event')
                                        <form action="{{ route('mark.event.rejected') }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="ids[]" value="{{ $event->id }}">
                                            <x-backend.ui.button :disabled="$event->rejected_at" type="submit"
                                                class="text-capitalize btn-sm btn-danger">Reject</x-backend.ui.button>
                                        </form>
                                        <form action="{{ route('mark.event.completed') }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="ids[]" value="{{ $event->id }}">

                                            <x-backend.ui.button :disabled="$event->completed_at" type="submit"
                                                class="text-capitalize btn-sm btn-primary">Complete</x-backend.ui.button>
                                        </form>
                                        <x-backend.ui.button type="edit" href="{{ route('calendar.edit', $event->id) }}"
                                            class="text-capitalize btn-sm" />
                                    @endcan
                                    @can('delete event')
                                        <x-backend.ui.button type="delete" action="{{ route('calendar.destroy', $event->id) }}"
                                            class="text-capitalize btn-sm" />
                                    @endcan
                                </div>
                            </td>
                        @endcanany
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center bg-light text-dark">No events created yet</td>
                    </tr>
                @endforelse
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
