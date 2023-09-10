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
    <x-backend.ui.breadcrumbs :list="['Backend', 'Client Studio', 'View', 'All']" />
    <x-backend.ui.section-card name="Client Studios">
        <x-backend.table.basic :data="$data">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key=>$datum)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ useImage($datum->image) }}</td>
                        <td>{{ $datum->title }}</td>
                        <td>
                            <div class="btn-group">
                                <x-backend.ui.button type="edit" href="{{ route('client-studio.edit', $datum->id) }}"
                                    class="btn-sm" />
                                <x-backend.ui.button type="delete" action="{{ route('client-studio.destroy', $datum->id) }}"
                                    class="btn-sm" />
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
