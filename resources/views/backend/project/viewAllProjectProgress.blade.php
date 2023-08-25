@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Show All', 'Project']" />
    {{-- {{ dd($clients[0]->projects[0]->pivot->client_id) }} --}}
    <x-backend.ui.section-card name="Projects">
        <div class="mb-2">
            <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">(+) Create</a>
        </div>
        <div id="bar" class="progress my-3" style="height: 15px;">
            <span class="text-dark">Tax Project:</span>
            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
        </div>
        <div id="bar" class="progress my-3" style="height: 15px;">
            <span class="text-dark">Tax Project:</span>
            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
        </div>
        <div id="bar" class="progress my-3" style="height: 15px;">
            <span class="text-dark">Tax Project:</span>
            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
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
                        {{ dd($project) }}
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
