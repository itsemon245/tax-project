@extends('backend.layouts.app')
@push('customCss')
    <style>
        .address p{
            margin-bottom: 0.2rem;
        }
    </style>
@endpush
@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Map', 'Show']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Show Map">
        <div class="row">
            @forelse ($maps as $map)
                <div class="col-md-4">
                    <div class="card">
                        <iframe
                            src="{{$map->src}}" class="w-100 rounded-top rounded-left rounded-right shadow-top shadow-start shadow-end" height="350x" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <div class="card-body p-2">
                            <p class="fw-bold text-capitalize mb-1 fs-4">{{ $map->location}}</p>
                            <div class="address mb-2">{!! $map->address!!}</div>
                            <p class="">
                                <small class="text-muted">{{ $map->updated_at->diffForHumans() }}</small>
                            </p>
                            <x-backend.ui.button class="btn-sm" type='edit' href="{{route('map.edit', $map)}}"></x-backend.ui.button>
                            <x-backend.ui.button class="btn-sm" type='delete' action="{{route('map.destroy', $map)}}"></x-backend.ui.button>
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
