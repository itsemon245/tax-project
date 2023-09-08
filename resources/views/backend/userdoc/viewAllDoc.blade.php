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
    <x-backend.ui.breadcrumbs :list="['User Data', 'Documents', 'View']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Users Documents">
        <x-btn-back class="me-2 mb-3"></x-btn-back>
        <x-backend.ui.button type="custom" href="{{ route('userDoc.backend.create') }}" class="mb-3 btn-sm btn-success">New
            Name</x-backend.ui.button>
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Info</th>
                    <th>Document Info</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($userDocs as $key => $doc)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <p class="mb-0">Name: {{ $doc->user->name }}</p>
                            <p class="mb-0 text-muted">Username: {{ $doc->user->user_name }}</p>
                            <p class="mb-0 text-muted">Phone: {{ $doc->user->phone }}</p>
                            <a href="mailto:{{ $doc->user->email }}">
                                <p class="mb-0 text-muted">Email: {{ $doc->user->email }}</p>
                            </a>
                        </td>
                        <td>
                            <div>
                                <p class="mb-0">
                                    Title: {{ $doc->name }}
                                </p>
                            </div>
                        </td>
                        <td id="tooltip-container">
                            <div class="avatar-group">
                                @foreach ($doc->files as $file)
                                    <a href="{{ useImage($file->file) }}" class="avatar-group-item"
                                        data-bs-container="#tooltip-container" data-bs-toggle="tooltip"
                                        data-bs-placement="top">
                                        <img src="{{ useImage($file->file) }}"
                                            class="rounded-circle border border-light border-3 avatar-md" alt="friend">
                                    </a>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <x-backend.ui.button type="custom" href="{{ route('userDoc.backend.show', $doc->id) }}"
                                    class="btn-sm btn-info me-1">View</x-backend.ui.button>
                                @if (!$doc->user->hasRole('user') && !$doc->user->hasRole('partner'))
                                    <x-backend.ui.button type="delete"
                                        action="{{ route('userDoc.backend.destroy', $doc->id) }}" class="btn-sm" />
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                {{-- {{ dd(json_decode($upload_documents[0]->files)) }} --}}
            </tbody>
        </x-backend.table.basic>
        <div class="paginate md-md-0 mt-3 mt-md-0 me-4 me-md-0">
            {{ $userDocs->links() }}
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
