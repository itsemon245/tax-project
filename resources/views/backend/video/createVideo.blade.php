@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Video', 'Create']" />

    <x-backend.ui.section-card name="Video Section">

        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Video Title" required type="text" name="title">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="video" required type="file" name="video">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-12">
                    <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description" label="Description">
                    </x-form.ck-editor>
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
