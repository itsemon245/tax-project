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
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Role']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="List Roles">
        <a href="{{ route('role.create') }}" class="btn waves-effect waves-light text-uppercase btn-success btn-sm mb-2">
            New+
        </a>
        <x-backend.table.basic :data="$roles">
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
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td class="text-uppercase">{{ $role->name }}</td>
                        <td>{{ Carbon\Carbon::parse($role->created_at)->format('d M Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($role->updated_at)->diffForHumans() }}</td>
                        <td>
                            <x-backend.ui.button type="edit" href="{{ route('role.edit', $role->id) }}" class="btn-sm" />
                            <x-backend.ui.button type="delete" action="{{ route('role.destroy', $role->id) }}"
                                class="btn-sm" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
        <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
            {{ $roles->links() }}
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
