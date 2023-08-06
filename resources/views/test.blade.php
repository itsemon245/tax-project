@extends('frontend.layouts.app')

@section('main')
    <ul>

        @foreach ($clients as $client)
            @foreach ($client->projects as $project)
                <li>
                    Project: {{ $project->name }}
                    <span class="mx-3"></span>
                    Client: {{ $client->name }}
                    <span class="ms-3">Tasks:</span>
                    <ul class="d-inline-flex gap-2 list-unstyled">
                        @foreach ($client->tasks($project->id)->get() as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        @endforeach
    </ul>
@endsection
