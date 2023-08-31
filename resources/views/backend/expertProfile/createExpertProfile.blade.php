@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Expert Profile', 'Create']" />

    <x-backend.ui.section-card name="Expert Section">

        <form action="{{ route('expert-profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" required type="text" name="name">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Post" required type="text" name="post">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor1" name="bio" placeholder="Bio" label="Bio">
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor2" name="description" placeholder="description" label="Description">
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Experience" required type="number" name="experience">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Join Date" required type="date" name="join_date">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Availability Date" required type="text" name="availability"
                        placeholder="Sat-Fri(08:00AM-11:55PM)">
                    </x-backend.form.text-input>
                    <br>
                    <x-form.ck-editor id="ck-editor3" name="at_a_glance" placeholder="Sat-Fri(08:00AM-11:55PM)"
                        label="At a Glance">
                    </x-form.ck-editor>
                    <x-backend.form.text-input label="Price" required type="number" name="price">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="image" />
                </div>

                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
