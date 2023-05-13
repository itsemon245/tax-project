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
                        <td>{{ Str::limit($calendar->title, 15, '...') }}</td>
                        <td>{{ $calendar->start }}</td>
                        <td>{{ Str::limit($calendar->description, 15, '...') }}</td>
                        <td>
                            <x-backend.ui.button type="edit" :href="route('calendar.edit', $calendar->id)" class="btn-sm" />
                            <x-backend.ui.button type="delete" :action="route('calendar.destroy', $calendar)" class="btn-sm" />
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
