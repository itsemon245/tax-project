
@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Show All', 'Project']" />
    {{-- {{ dd($clients[0]->projects[0]->pivot->client_id) }} --}}
    <x-backend.ui.section-card name="Projects">
        <div class="mb-2">
            <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">(+) Create</a>
        </div>
        <div class="row border-bottom mb-1">
            <div class="col-md-12">
                <div id="progressbarwizard">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#daily" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 active" aria-selected="true"
                                    role="tab" tabindex="-1">
                                    <i class="mdi mdi-clock-time-two-outline"></i>
                                    <span class="d-none d-sm-inline">Daily</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#weekly" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0" aria-selected="false" role="tab"
                                    tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Weekly</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#monthly" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0" aria-selected="false" role="tab"
                                    tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Monthly</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#total" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0" aria-selected="false" role="tab"
                                    tabindex="-1">
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
                                    @forelse ($clients[0]->projects as $project)
                                    @php
                                        $progress = $project->daily_target === 0 ? 100 : ($project->daily_progress * 100) / $project->daily_target; 
                                        $progress = round($progress);
                                        $color = match( true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                    @endphp
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}%;"><span class="text-light">{{ $progress }}%</span></div>
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
                                    @forelse ($clients[0]->projects as $project)
                                    @php
                                     $progress = $project->weekly_target === 0 ? 100 : ($project->weekly_progress * 100) / $project->weekly_target; 
                                    $progress = round($progress);
                                    $color = match( true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                    @endphp
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width: {{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
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
                                    @forelse ($clients[0]->projects as $project)
                                    @php
                                    $progress = $project->monthly_target === 0 ? 100 : ($project->monthly_progress * 100) / $project->monthly_target; 
                                    $progress = round($progress);
                                    $color = match( true) {
                                    $progress <= 30 => 'bg-danger',
                                    $progress <= 60 => 'bg-warning',
                                    default => 'bg-success',
                                    };
                                    @endphp
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width: {{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
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
                                    @forelse ($clients[0]->projects as $project)
                                    @php
                                    $progress = $project->total_clients === 0 ? 100 : ($project->total_progress * 100) / $project->total_clients; 
                                    $progress = round($progress);
                                    $color = match( true) {
                                    $progress <= 30 => 'bg-danger',
                                    $progress <= 60 => 'bg-warning',
                                    default => 'bg-success',
                                    };
                                    @endphp
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width:{{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
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
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>User</th>
                    <th>Task List</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $key=>$client)
                    @foreach ($client->projects as $project)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{!! $project->name !!}</td>
                        <td>{!! $client->name !!}</td>
                        <td>{!! $client->phone !!}</td>
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($client->users as $user)
                                    <span class="bg-soft-success text-dark">{{ $user->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td> 
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($project->tasks as $task)
                                    <span class=" bg-soft-success text-dark rounded-3">{{ $task->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('project.edit', $project) }}" class="btn btn-sm btn-success">Edit</a>
                                <form action="{{ route('project.destroy', $project->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                </form>
                            </div>
                        </td>
                    </tr>   
                    @endforeach
                @empty
                    <tr>
                        <td colspan="6">
                            <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection