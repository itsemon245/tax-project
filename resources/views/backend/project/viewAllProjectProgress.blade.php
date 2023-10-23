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
    <x-backend.ui.section-card name="Projects">
        @can('create progress')
            <div class="mb-2">
                <x-backend.ui.button type="custom" href="{{ route('project.create') }}"
                    class="btn-success btn-sm">Create</x-backend.ui.button>
            </div>
        @endcan
        <div class="row border-bottom mb-1">
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
                                                $progress > 30 && $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                            <div class="bar progress-bar {{ $color }}"
                                                style="width: {{ $progress }}%;">
                                                <span class="text-light font-18 fw-bold">{{ $progress }}%</span>
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
                                            $weekly_progress = $project->daily_progress / $project->weekly_target;
                                            $progress = $project->weekly_target === 0 ? 100 : $weekly_progress * 100;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress > 30 && $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                            <div class="bar progress-bar {{ $color }}"
                                                style="width: {{ $progress }}%;"><span
                                                    class="text-light font-18 fw-bold">{{ $progress }}%</span></div>
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
                                            $progress = ($project->daily_progress / $project->monthly_target) * 100;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress > 30 && $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                            <div class="bar progress-bar {{ $color }}"
                                                style="width: {{ $progress }}%;"><span
                                                    class="text-light font-18 fw-bold">{{ $progress }}%</span></div>
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
                                            $progress = ($project->daily_progress / $project->total_clients) * 100;
                                            $progress = round($progress);
                                            $color = match (true) {
                                                $progress <= 30 => 'bg-danger',
                                                $progress > 30 && $progress <= 60 => 'bg-warning',
                                                default => 'bg-success',
                                            };
                                        @endphp
                                        <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                        <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                            <div class="bar progress-bar {{ $color }}"
                                                style="width:{{ $progress }}%;"><span
                                                    class="text-light font-18 fw-bold">{{ $progress }}%</span></div>
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
        </div>
        <x-backend.table.basic :items="$projects">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Task List</th>
                    @canany(['read progress', 'update progress', 'update task', 'delete progress', 'assign client'])
                        <th>Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $key=>$project)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $project->name }}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($project->tasks as $i => $task)
                                    <div class="form-check mb-2 form-check-success">
                                        {{-- <input
                                                data-url="{{ route('ajax.task.update', ['client' => $client->id, 'task' => $task->id]) }}"
                                                class="form-check-input rounded-circle" type="checkbox" value=""
                                                id="{{ "project-$key-task-$i" }}" @checked($task->isCompleted($client->id))> --}}
                                        <label class="form-check-label"
                                            for="{{ "project-$key-task-$i" }}">{{ $task->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        @canany(['read progress', 'update progress', 'update task', 'delete progress', 'assign client'])
                            <td>
                                @can('read progress')
                                    <x-backend.ui.button type="custom" href="{{ route('project.clients', $project->id) }}"
                                        class="btn-dark btn-sm">Show All</x-backend.ui.button>
                                @endcan
                                @can('update progress')
                                    <x-backend.ui.button type="edit" href="{{ route('project.edit', $project->id) }}"
                                        class="btn-sm" />
                                @endcan
                                @can('delete progress')
                                    <x-backend.ui.button type="delete" action="{{ route('project.destroy', $project->id) }}"
                                        class="btn-sm" />
                                @endcan
                                @can('assign client')
                                    <x-backend.ui.button type="custom" href="{{ route('project.assign', $project->id) }}"
                                        class="btn-sm btn-primary"> Assign </x-backend.ui.button>
                                @endcan
                            </td>
                        @endcanany
                    </tr>
                @empty
                    {{-- <tr>
                        <td colspan="4">
                            <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                        </td>
                    </tr> --}}
                @endforelse
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    <!-- end row-->
    @push('customJs')
        <script>
            $(document).ready(function() {
                // $('.form-check-input').on('change', e => {
                //     $.ajax({
                //         type: "post",
                //         url: e.target.dataset.url,
                //         headers: {
                //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //         },
                //         success: function(response) {
                //             if (response.success) {
                //                 Toast.fire({
                //                     'icon': 'success',
                //                     'title': 'Success',
                //                     'text': response.message
                //                 })
                //             } else {
                //                 Toast.fire({
                //                     'icon': 'error',
                //                     'title': 'Error',
                //                     'text': response.message
                //                 })
                //             }
                //         }
                //     });
                // })
            });
        </script>
    @endpush
@endsection
