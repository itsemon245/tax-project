@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study']" />

    <x-backend.ui.section-card name="Case Study Create">
        <div class="mb-3">
            <a href="#" class="btn-info btn btn-sm">BACK</a>
        </div>
       <form action="{{ route('case.study.backend.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-3">
            <h4>Case Study Page Content</h4>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <x-backend.form.text-input label="Title"  type="text" name="title">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-9 mb-2">
                    <x-form.ck-editor id="ck-editor1"  name="page_description" placeholder="Page Description"
                    label="Page Description">
                </x-form.ck-editor>
                </div>
                <div class="col-md-3 mb-2">
                    <x-backend.form.image-input name="image"  />
                </div>
                <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
            </div>
        </div>
        </form>
        <form action="#" method="post">
            <div class="card p-3">
                <h4>Case Study Packege</h4>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Name"  type="text" name="name">
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-9 mb-2">
                    </div>
                    <div class="col-md-3 mb-2">
                        <x-backend.form.image-input name="logo"  />
                    </div>
                    <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
