@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Expert Profile', 'Edit']" />

    <x-backend.ui.section-card name="Expert Section">

        <form action="{{ route('expert-profile.update', $profile) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" required type="text" name="name"
                        value="{{ $profile->name }}">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Post" required type="text" name="post"
                        value="{{ $profile->post }}">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor1" name="bio" placeholder="Bio" label="Bio">
                        {{ $profile->bio }}
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor2" name="description" placeholder="description" label="Description">
                        {{ $profile->description }}
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Experience" required type="number" name="experience"
                        value="{{ $profile->experience }}">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Join Date" required type="text" name="join_date"
                        value="{{ $profile->join_date }}">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Availability Date" required type="text" name="availability"
                        placeholder="Sat-Fri(08:00AM-11:55PM)" value="{{ $profile->availability }}">
                    </x-backend.form.text-input>
                    <br>
                    <x-form.ck-editor id="ck-editor3" name="at_a_glance" placeholder="Sat-Fri(08:00AM-11:55PM)"
                        label="At a Glance">
                        {{ $profile->at_a_glance }}
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="image" :image="$profile->image" />
                </div>
                <div class="col-md-612">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
