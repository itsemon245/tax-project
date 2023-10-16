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
        {{-- <div class="row border-bottom mb-1">
            <div class="col-md-12">
                <div id="progressbarwizard">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#daily" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 active"
                                    aria-selected="true" role="tab" tabindex="-1">
                                    <i class="mdi mdi-clock-time-two-outline"></i>
                                    <span class="d-none d-sm-inline">Daily</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#weekly" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Weekly</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#monthly" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Monthly</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#total" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Total</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content ">
                        <div class="tab-pane my-3 active" id="daily" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($projects as $project)
                                        @php
                                            $progress = $project->daily_target === 0 ? 100 : ($project->daily_progress * 100) / $project->daily_target;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                            <div
                                                class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}%;">
                                                <span class="text-light">{{ $progress }}%</span>
                                            </div>
                                        </div>
                                    @empty
                                        <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                    @endforelse
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane my-3" id="weekly" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($projects as $project)
                                        @php
                                            $progress = $project->weekly_target === 0 ? 100 : ($project->weekly_progress * 100) / $project->weekly_target;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                            <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}"
                                                style="width: {{ $progress }}%;"><span
                                                    class="text-light">{{ $progress }}%</span></div>
                                        </div>
                                    @empty
                                        <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                    @endforelse
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane my-3" id="monthly" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($projects as $project)
                                        @php
                                            $progress = $project->monthly_target === 0 ? 100 : ($project->monthly_progress * 100) / $project->monthly_target;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                            <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}"
                                                style="width: {{ $progress }}%;"><span
                                                    class="text-light">{{ $progress }}%</span></div>
                                        </div>
                                    @empty
                                        <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                    @endforelse
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane my-3" id="total" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($projects as $project)
                                        @php
                                            $progress = $project->total_clients === 0 ? 100 : ($project->total_progress * 100) / $project->total_clients;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                            <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}"
                                                style="width:{{ $progress }}%;"><span
                                                    class="text-light">{{ $progress }}%</span></div>
                                        </div>
                                    @empty
                                        <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                    @endforelse
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- tab-content -->
                </div>
            </div>
        </div> --}}
        
        <x-backend.table.basic :items="$project?->clients">
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
                @if ($project?->clients->count() > 0)
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
