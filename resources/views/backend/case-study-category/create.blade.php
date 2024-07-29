@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Case Study Category']" />

    <x-backend.ui.section-card name="Case Study Category Create">
        <div class="mb-3">
            <a href="{{ route('case-study-category.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
       <form action="{{ route('case-study-category.store') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Case Study Category Name" placeholder="Case Study Category Name"  type="text" name="case_study_category" />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
        </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
