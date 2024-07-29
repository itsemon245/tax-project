@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Case Study Category']" />

    <x-backend.ui.section-card name="Case Study Category Edit">
        <div class="mb-3">
            <a href="{{ route('case-study-category.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
        <form action="{{ route('case-study-category.update', $caseStudyCategory->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <x-backend.form.text-input label="Case Study Category Name" placeholder="Case Study Category Name" type="text"
                                name="case_study_category" value="{{ $caseStudyCategory->name }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <x-backend.ui.button class="btn-primary btn btn-sm">Update</x-backend.ui.button>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
