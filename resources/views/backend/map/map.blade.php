@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Map', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Map">
        <form action="{{ route('map.store') }}" method="post">
            @csrf
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-backend.form.text-input class="mb-1" label="Location" type="text" name="location" required />
                        <x-form.ck-editor label="Address" id="address" name="address" placeholder="Address" class="form-control" cols="30" rows="4"
                            required></x-form.ck-editor>

                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="iframe-link" class="form-label mb-0">Iframe Link <span
                                    class='text-danger'>*</span></label>
                            <textarea id="iframe-link" name="iframe_link" placeholder="<iframe ....></iframe>" class="form-control" cols="30"
                                rows="8" required></textarea>
                            @error('iframe_link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
            </div>
        </form>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
