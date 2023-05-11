@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Event', 'View']" />

    <x-backend.ui.section-card name="Event List">

        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($calendars as $key => $calendar)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ Str::limit($calendar->envent_name, 15, '...') }}</td>
                        <td>{{ $calendar->envent_start_date }}</td>
                        <td>{{ Str::limit($calendar->event_description, 15, '...') }}</td>
                        <td>
                            <a href="{{ route('calendar.edit', $calendar->id) }}" class="btn btn-info btn-sm">Edit</a>
                            {{-- <form action="{{ route('calendar.destroy', $calendar->id) }}" method="post"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                            </form> --}}
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
