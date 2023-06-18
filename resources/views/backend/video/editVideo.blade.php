@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Video', 'Edit']" />

    <x-backend.ui.section-card name="Video Section">

        <form action="{{ route('video.update', $video->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Video Title" required type="text" name="title" value="{{ $video->title }}">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="video" type="file" name="video">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-12">
                    <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description" label="Description" >
                        {!! $video->description !!}
                    </x-form.ck-editor>
                </div>
                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Update</x-backend.ui.button>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
