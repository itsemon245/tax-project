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
    <x-backend.ui.breadcrumbs :list="['User', 'Appointments']" />

    <x-backend.ui.section-card name="User Appointments">
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Info</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Action</th>
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
                        @isset($appointment->map_id)
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
                        @endisset
                        <td>
                            <form action="{{ route('user-appointments.approve', $appointment->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Approve
                                </button>
                            </form>
                        </td>
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
        <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
            {{ $appointments->links() }}
        </div>
    </x-backend.ui.section-card>
@endsection
