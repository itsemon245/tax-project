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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Appointment', 'View']" />

    <x-backend.ui.section-card name="Appointments List">
        <x-backend.ui.button type="custom" href="{{ route('appointment.create') }}"
            class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        <x-backend.table.basic :data="$appointments">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Tag</th>
                    <th>Text</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $key => $appointment)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ useImage($appointment->image) }}" alt="{{ $appointment->title }}" width="80px"
                                loading="lazy" /></td>
                        <td>{{ Str::limit($appointment->title, 15, '...') }}</td>
                        <td>{{ Str::limit($appointment->sub_title, 15, '...') }}</td>
                        <td>{{ Str::limit($appointment->tag, 15, '...') }}</td>
                        <td>{{ Str::limit($appointment->description, 15, '...') }}</td>
                        <td>
                            <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('appointment.destroy', $appointment->id) }}" method="post"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>

    @push('customJs')
        <script>
            var appointmentDelete = $('.appointment-delete');
            appointmentDelete.on('click', function() {
                var form = $(this).next('form')
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit()
                    }
                })
            })
        </script>
    @endpush
@endsection
