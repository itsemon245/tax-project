@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Project Discussion', 'Single']" />
    <x-backend.ui.section-card name="Project Discussion Single View">
        <div class="container">
            <div class="d-flex justify-content-between mb-2">
                <a href="" class="btn btn-sm btn-primary">Back</a>
                <form action="{{ route('project-discussion.destroy', $projectDiscussion) }}" method="post"
                class="d-inline-block py-0">
                @csrf
                @method('DELETE')
                <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
            </form>
            </div>
            <div class="row">
                <div class="col-md-6 p-2 card">
                    <h4 class="mb-2">Name</h4>
                    <p>{{ $projectDiscussion->name }}</p>
                </div>
                <div class="col-md-6 p-2 card">
                    <h4 class="mb-2">Phone</h4>
                    <p><a href="tel:+880{{ $projectDiscussion->phone }}">+880{{ $projectDiscussion->phone }}</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-2 card">
                    <h4 class="mb-2">Email</h4>
                    <p><a href="mailto:{{ $projectDiscussion->email }}">{{ $projectDiscussion->email }}</a></p>
                </div>
                <div class="col-md-6 p-2 card">
                    <h4 class="mb-2">Location</h4>
                    <p>{{ $projectDiscussion->location }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-2 card">
                    <h4>Massage</h4>
                    <p>{{ $projectDiscussion->message }}</p>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>    
@endsection
