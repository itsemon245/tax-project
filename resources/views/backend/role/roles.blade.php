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
        <a href="{{ route('role.create') }}" class="mb-2 btn waves-effect waves-light text-uppercase btn-success btn-sm">
            New+
        </a>
        <x-backend.table.basic :items="$roles">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    @canany(['update role', 'delete role', 'read role'])
                        <th>Action</th>
                    @endcanany
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td class="text-uppercase">{{ $role->name }}</td>
                        <td>{{ Carbon\Carbon::parse($role->created_at)->format('d M Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($role->updated_at)->diffForHumans() }}</td>
                        @canany(['update role', 'delete role'])
                            <td>
                                @if ($role->name == 'super admin')
                                @else
                                    @can('update role')
                                        <x-backend.ui.button type="edit" href="{{ route('role.edit', $role->id) }}"
                                            class="btn-sm" />
                                    @endcan
                                    @can('delete role')
                                        <x-backend.ui.button type="delete" action="{{ route('role.destroy', $role->id) }}"
                                            class="btn-sm" />
                                    @endcan
                                @endif
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
