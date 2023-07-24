@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Industry Section']" />

    <x-backend.ui.section-card name="Industry Create">
        <div class="mb-3">
            <a href="{{ route('industry.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
        <div class="row ">
            <div class="col-md-12 mb-2">
                <h4>Page Content:</h4>
               {!! $industry->page_description !!}
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <h4>Logo: </h4>
                <img src="{{ useImage($industry->logo) }}" alt="">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h4>Name</h4>
                        {{ $industry->name }}
                    </div>
                    <div class="col-md-12 mb-2">
                        <h4>Description</h4>
                        {{ $industry->description }}
                    </div>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
