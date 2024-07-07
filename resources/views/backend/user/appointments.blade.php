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
    <x-backend.ui.breadcrumbs :list="['User', (request('type')=='consultation' ? 'Consultations' : 'Appointments')]" />

    <x-backend.ui.section-card name="User {{request('type')=='consultation' ? 'Consultations' : 'Appointments'}}">
        @if ($appointments->count() > 0)
            <x-backend.table.basic :items="$appointments">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Info</th>
                        @if (request('type')=='consultation' && auth()->user()->hasRole('admin'))
                            <th>Appointment With</th>
                        @endif
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Created at</th>
                        @canany(['update appointment', 'approve appointment'])
                            <th>Action</th>
                        @endcanany
                    </tr>
                </thead>

                <tbody>
                    @forelse ($appointments as $appointment)
                        <tr>
                            <td>1</td>
                            <td>
                                <p class="mb-1">
                                    <strong>Name:</strong> <span>{{ $appointment->name }}</span>
                                </p>
                                <p class="mb-1">
                                    <strong>Email:</strong> <span>{{ $appointment->email }}</span>
                                </p>
                                <p class="mb-1">
                                    <strong>Phone:</strong> <span>{{ $appointment->phone }}</span>
                                </p>
                                <div class="d-flex gap-3">
                                    <p class="mb-1">
                                        <strong>District:</strong> <span>{{ $appointment->district }}</span>
                                    </p>
                                    <p class="mb-1">
                                        <strong>Thana:</strong> <span>{{ $appointment->thana }}</span>
                                    </p>
                                </div>
                            </td>
                            @if (request('type')=='consultation' && auth()->user()->hasRole('admin'))
                                <td>
                                    <p class="mb-1">
                                        <strong>Expert Name:</strong> <span>{{ $appointment->expertProfile?->name }}</span>
                                    </p>
                                    <p class="mb-1">
                                        <strong>Post:</strong> <span
                                            class="badge bg-success p-2">{{ $appointment->expertProfile?->post }}</span>
                                    </p>
                                </td>
                            @endif
                            <td>
                                <strong class="d-block">Date:
                                    {{ Carbon\Carbon::parse($appointment->date)->format('d M, Y') }}</strong>
                                <strong class="d-block">Time: {{ $appointment->time }}</strong>

                            </td>
                            <td>
                                @if ($appointment->is_completed)
                                    <span class="badge bg-soft-success text-success p-1 fs-6">Completed</span>
                                @else
                                    <span class="badge bg-warning p-1 fs-6">Yet to complete</span>
                                @endif
                            </td>
                            @if($appointment->map)
                                <td>
                                    <strong>Location: {{ $appointment->map->location }}</strong>
                                    <strong class="d-block">Address:</strong>
                                    <p class="text-muted">
                                        {{ $appointment->map->address }}
                                    </p>
                                </td>
                            @else
                                <td>
                                    <span class="badge bg-info p-1 fs-6">
                                        Virtual
                                    </span>
                                </td>
                            @endif
                            <td>
                                <span class="fw-bold">
                                    {{ $appointment->created_at->format('d F, Y') }}
                                </span>
                            </td>
                            @canany(['update appointment', 'approve appointment'])
                                <td>
                                    <form action="{{ route('user-appointments.approve', $appointment->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Approve
                                        </button>
                                    </form>
                                </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="bg-light">
                                <div class="text-center text-muted">
                                    No Appointments Found
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>



            </x-backend.table.basic>
        @endif
    </x-backend.ui.section-card>
@endsection
