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
                                <a href="#yearly" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0" aria-selected="false" role="tab"
                                    tabindex="-1">
                                    <i class="mdi mdi-table-clock"></i>
                                    <span class="d-none d-sm-inline">Yearly</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content ">
                        <div class="tab-pane my-3 active" id="daily" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($clients[0]->projects as $project)
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $project->daily_progress <= 30 ? 'bg-danger' : ($project->daily_progress <= 60 ? 'bg-warning' : 'bg-success') }}" style="width: 90%;"><span class="text-light">90%</span></div>
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
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $project->daily_progress <= 30 ? 'bg-danger' : ($project->daily_progress <= 60 ? 'bg-warning' : 'bg-success') }}" style="width: 60%;"><span class="text-light">60%</span></div>
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
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $project->daily_progress <= 30 ? 'bg-danger' : ($project->daily_progress <= 60 ? 'bg-warning' : 'bg-success') }}" style="width: 250%;"><span class="text-light">25%</span></div>
                                    </div>
                                    @empty
                                    <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                    @endforelse
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane my-3" id="yearly" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($clients[0]->projects as $project)
                                    <span class="text-dark">{{ $project->name }}:</span>
                                    <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $project->daily_progress <= 30 ? 'bg-danger' : ($project->daily_progress <= 60 ? 'bg-warning' : 'bg-success') }}" style="width: 30%;"><span class="text-light">80%</span></div>
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
