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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Show All', 'Project']" />
    <x-backend.ui.section-card name="Showing all clients for project '{{ $project?->name }}'">
        <div class="mb-2">
            <x-backend.ui.button type="custom" href="{{ route('project.index') }}"
                class="btn-success btn-sm">Back</x-backend.ui.button>
        </div>

        <x-backend.table.basic :items="$clients">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @if ($clients->count() > 0)
                    @forelse ($clients as $key=>$client)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{!! $client->name !!}</td>
                            <td>{!! $client->phone !!}</td>
                            <td>
                                <div class="d-inline-flex flex-column flex-wrap gap-2">
                                    @foreach ($users as $user)
                                        <input
                                            data-url="{{ route('project.assigned', ['client' => $client->id, 'user' => $user->id, 'project' => $project->id]) }}"
                                            type="checkbox" id="users" class="form-check-input rounded-circle users" />
                                        <label for="users">{{ $user->name }}</label>
                                    @endforeach
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
                @endif
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    <!-- end row-->
    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.users').on('change', e => {
                    $.ajax({
                        type: "post",
                        url: e.target.dataset.url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            Toast.fire({
                                'icon': 'success',
                                'title': 'Success',
                                'text': response.message
                            })
                        },
                    });
                })
            });
        </script>
    @endpush
@endsection
