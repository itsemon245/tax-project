@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Map', 'Show', 'Single']" />
    <!-- end page title -->
    <x-backend.ui.section-card name="View Single Map">
        <div class="row">
            <div class="card">
                <div class="col-md-12">
                    <a href="{{ route('map.create') }}" class="mb-2 mt-2 btn btn-sm btn-light">Back</a>
                    <img class="card-img-top img-fluid" src="{{useImage($map->image)}}" >
                    <p class="card-text mt-1">
                        <small class="text-muted">{{ $map->created_at->diffForHumans() }}</small>
                    </p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Link: <span class="text-muted">{{ $map->link }}</span></label>
                                <label class="mt-3">Address: 
                                    <p class="text-muted">{{ $map->address }}</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->          
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection






















