@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Industry Section']" />

    <x-backend.ui.section-card name="Industry Create">
        <div class="mb-3">
            <a href="{{ route('industry.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
       <form action="{{ route('industry.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row ">
            <div class="col-md-12 mb-2">
                <x-form.ck-editor id="ck-editor1"  name="page_description" placeholder="Page Description"
                label="Page Description">
                {{-- {!! $findPageDescription !!} --}}
            </x-form.ck-editor>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <x-backend.form.image-input name="logo"  />
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Name"  type="text" name="name">
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="w-100" for="description">Description <span class="text-danger">*</span>
                            <textarea name="description" id="description" cols="30" rows="4" placeholder="Type Industry Detiles..." class="form-control"></textarea>
                        </label>
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
