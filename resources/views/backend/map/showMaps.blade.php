@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Map', 'Show']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Show Map">
        <div class="row">
            @forelse ($maps as $map)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ useImage($map->image) }}" >
                    <div class="card-body">
                        <p class="card-text">{{ Str::limit($map->address, 200) }}</p>
                        <p class="card-text">
                            <small class="text-muted">{{ $map->updated_at->diffForHumans() }}</small>
                        </p>
                        <div class="row">
                            <span class="col-md-3"><a href="{{ route('map.show', $map) }}" class="btn-info btn btn-sm">View</a></span>
                            <span class="col-md-5">
                                    <form action="{{ route('map.destroy', $map) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <x-backend.ui.button class="btn-danger btn-sm">Delete</x-backend.ui.button>
                                </form>
                                </span>
                            <span class="col-md-4"><a href="{{ $map->link }}" target="_blank" class="btn-primary btn-sm">Go to map</a></span>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->  
            @empty
            <div class="col-md-6 mx-auto">
                <div class="card p-3">
                    <h5 class="text-center text-muted">No data found.</h5>
                </div> <!-- end card-->
            </div> <!-- end col -->
            @endforelse
        
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection






















