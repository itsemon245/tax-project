@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Industry Section']" />

    <x-backend.ui.section-card name="Industry Create">
        <div class="row">
            <div class="col-md-12 mb-2">
                <x-form.ck-editor id="ck-editor1" name="description" placeholder="Page Description"
                label="Page Description">
            </x-form.ck-editor>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <x-backend.form.image-input name="logo" required />
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Name" required type="text" name="name">
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Intro" required type="text" name="intro">
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-12 mb-2">
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
