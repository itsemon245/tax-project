@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Achievment']" />

    <x-backend.ui.section-card name="Achievment Create">
        <div class="mb-3">
            <a href="{{ route('book-category.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
       <form action="{{ route('book-category.store') }}" method="post">
        @csrf
        
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Category Name" placeholder="Category Name"  type="text" name="category_name" />
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
