@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Map', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Map">
    <form action="{{ route('map.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                    <x-backend.form.text-input label="Link" type="text"  name="link" required />  
                    <textarea name="address" placeholder="Input Address" class="form-control mt-2" cols="30" rows="12"></textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input class="mt-1" name="map_image" />
                    
                </div>
            </div>
            <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
    </form>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
