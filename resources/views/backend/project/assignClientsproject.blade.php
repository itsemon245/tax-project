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

            .form-check-label {
                padding: 6px;
                border-radius: 4px;
            }

            .unselected {
                border: 1px solid var(--ct-dark);
            }

            .selected {
                --ct-bg-opacity: 0.25;
                background-color: rgba(var(--ct-success-rgb), var(--ct-bg-opacity)) !important;
                border: 1px solid var(--ct-success);
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
                    <th>Assign Employees</th>
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
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($employees as $employee)
                                        <div>
                                            <input
                                                data-url="{{ route('project.assigned', ['client' => $client->id, 'user' => $employee->id, 'project' => $project->id]) }}"
                                                type="checkbox" id="employee-{{ $employee->id . '-' . $client->id }}"
                                                class="form-check-input rounded-circle" @checked($client->isEmployeeAssigned($project->id, $employee->id))
                                                hidden />
                                            <label for="employee-{{ $employee->id . '-' . $client->id }}"
                                                class="form-check-label {{ $client->isEmployeeAssigned($project->id, $employee->id) ? 'selected' : 'unselected' }}">{{ $employee->name }}</label>
                                        </div>
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
                $('.form-check-input').on('change', e => {
                    let url = e.target.dataset.url
                    let label = $(e.target).next()
                    $.ajax({
                        type: "post",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Toast.fire({
                                'icon': 'success',
                                'title': 'Success',
                                'text': response.message
                            })
                            label
                                .toggleClass('selected')
                                .toggleClass('unselected')

                        },
                    });
                })
            });
        </script>
    @endpush
@endsection
