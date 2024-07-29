@extends('backend.layouts.app')
@push('customCss')
    <style>
        .custom-editor .ck-content.ck-editor__editable {
            min-height: 100px !important;
        }

        .section-editor .ck-content.ck-editor__editable {
            min-height: 160px !important;
        }
    </style>
@endpush
@section('content')
    <x-backend.ui.breadcrumbs :list="['Pages', 'Industry', 'Create']" />
    <x-backend.ui.section-card name="Create Industry">
        <div class="mb-3">
            <a href="{{ route('industry.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
        <form action="{{ route('industry.update', $industry->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            {{-- rest of the fields goes down here --}}
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-editor">
                            <x-form.ck-editor id="ck-editor2" name="page_description" placeholder="Page Description"
                                label="Page Description">
                                {!! $industry->page_description !!}
                            </x-form.ck-editor>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <x-backend.form.text-input name="title" placeholder="Title" label="Title" :value="$industry->title" />
                        <x-form.text-area class="h-75" id="ck-editor-intro" name="intro" placeholder="Intro"
                            label="Intro">
                            {{ $industry->intro }}
                        </x-form.text-area>
                    </div>
                    <div class="col-md-4">
                        <div class="h-100">
                            <x-backend.form.image-input name="image" placeholder="Logo" label="Logo"
                                :image="$industry->image"></x-backend.form.image-input>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-editor">
                            <x-form.ck-editor id="ck-editor-description" name="description" placeholder="Description"
                                label="Description">
                                {!! $industry->description !!}
                            </x-form.ck-editor>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <x-form.sections :sections="$industry->sections" />
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary waves-effect waves-light rounded-3">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
