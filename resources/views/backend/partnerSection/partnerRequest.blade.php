@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Peoples', 'Partner', 'Request']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Partner Requests">
        <x-backend.table.basic :data="$partnersReques">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Area</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($partnersRequest as $key => $Request)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $Request->name }}</td>
                        <td>{{ $Request->phone }}</td>
                        <td>
                            <p class="m-0">Division: {{ $Request->division }}</p>
                            <p class="m-0"><small>District: {{ $Request->district }}</small></p>
                            <p class="m-0"><small>Thana: {{ $Request->thana }}</small></p>
                        </td>
                        <td><small>{{ $Request->address }}</small></td>
                        <td>
                            <form action="{{ route('partner-request.update', $Request) }}" method="post">
                                @csrf
                                @method('PUT')
                            <x-backend.ui.button class="btn-success btn-sm">Approve</x-backend.ui.button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    @push('customJs')
        <script>
            const deleteinfo = id => {
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
                        Swal.fire({
                            title: 'Deleted',
                            text: "Your file has been deleted.",
                            icon: 'success',
                            showConfirmButton: false
                        })
                        $("#" + id).submit()
                    }
                })

            }
        </script>
    @endpush
@endsection
