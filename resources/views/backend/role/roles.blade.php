@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Role']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="List Roles">
        <a href="{{route('role.create')}}" class="btn waves-effect waves-light text-uppercase btn-success btn-sm mb-2">
            New+
        </a>
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>#</td>
                    <td>Admin</td>
                    <td>Today</td>
                    <td>Today</td>
                    <td>
                        <x-backend.ui.button class="btn-sm btn-info">Edit</x-backend.ui.button>
                        <x-backend.ui.button class="btn-sm btn-danger">Delete</x-backend.ui.button>
                    </td>
                </tr>
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
