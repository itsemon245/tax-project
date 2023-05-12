@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'User Documents', 'View', 'Single' ]" />
    <!-- end page title -->

    <x-backend.ui.section-card name="User Documents">
        <div class="col-md-12">
            <div class="btn-gruop">
                <x-backend.ui.button type="custom" href="{{ route('user-doc.index') }}" class="btn-sm btn-light">Back</x-backend.ui.button>
                <x-backend.ui.button type="custom" href="#" class="btn-sm btn-success">Approve</x-backend.ui.button>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-md-4">
                    <h4>Document Type: {{ $select_docs->document_type }}</h4>
                    <h5>Document Title: {{ $select_docs->title }}</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-0">Name: {{ $select_docs->user->name }}</h5>
                    <h5 class="mb-0">Username: {{ $select_docs->user->user_name }}</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-0">Phone: {{ $select_docs->user->phone }}</h5>
                    <h5 class="mb-0">Email: {{ $select_docs->user->email }}</h5>
                </div>
            </div>


            <div class="row">
                @forelse (json_decode($select_docs->images) as $image)

                <div class="col-md-6">
                    <div class="card">
                        <a href="{{ useImage($image) }}">
                        <img class="card-img-top img-fluid" src="{{ useImage($image) }}" >
                        </a>
                    </div> <!-- end card-->
                </div> <!-- end col -->  
                @empty
                <div class="col-md-12">
                    <div class="card">
                        <h5>No data found.</h5>
                    </div> <!-- end card-->
                </div> <!-- end col -->
                @endforelse
            
            </div>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
