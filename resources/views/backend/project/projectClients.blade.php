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
                    @can('update task progress')
                        <th>Task List</th>
                    @endcan
                    @canany(['update progress', 'delete progress'])
                        <th>Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @if ($clients->count() > 0)
                    @forelse ($project->clients as $key=>$client)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{!! $client->name !!}</td>
                            <td>{!! $client->phone !!}</td>
                            <td>
                                <div class="d-inline-flex flex-column flex-wrap gap-2">
                                    @foreach ($client->users as $user)
                                        <span class="text-blue bg-soft-blue p-1 rounded">{{ $user->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            @can('update task progress')
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($project->tasks as $i => $task)
                                            <div class="form-check mb-2 form-check-success">
                                                <input
                                                    data-url="{{ route('project.task.update', ['client' => $client->id, 'task' => $task->id, 'project'=> $project->id]) }}"
                                                    class="form-check-input rounded-circle" type="checkbox" value=""
                                                    id="{{ "project-$key-task-$i" }}" @checked($task->isCompleted($client->id))>
                                                <label class="form-check-label"
                                                    for="{{ "project-$key-task-$i" }}">{{ $task->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            @endcan
                            @canany(['update progress', 'delete progress'])
                                <td>
                                    @can('delete progress')
                                        <x-backend.ui.button type="delete"
                                            action="{{ route('project.destroy.client', ['project' => $project->id, 'client' => $client->id]) }}"
                                            class="btn-sm" />
                                    @endcan

                                </td>
                            @endcanany
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
                $('.form-check-input').on('change', e => {
                    $.ajax({
                        type: "post",
                        url: e.target.dataset.url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                console.log(response);
                                Toast.fire({
                                    'icon': 'success',
                                    'title': 'Success',
                                    'text': response.message
                                })
                            } else {
                                Toast.fire({
                                    'icon': 'error',
                                    'title': 'Error',
                                    'text': response.message
                                })
                            }
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
