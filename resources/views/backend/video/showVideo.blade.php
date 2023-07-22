@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Video', 'Show']" />

    <x-backend.ui.section-card name="Create Video">
        <x-backend.ui.button type="custom" class="btn-info btn-sm mb-2" :href="route('video.index') . '?course_id=' . $video->course_id">Back</x-backend.ui.button>

        <div class="row">
            <div class="col-12 mb-3">
                <video width="100%" height="480" controls>
                    <source src="{{ $video->video }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-12">
                <span class="d-block text-success fw-bold mb-0">{{ $video->course->name }}</span>
                <h4 class="mt-0 fw-bold">{{ $video->title }}</h4>
                <div class="card">
                    <div class="card-body py-2">
                        <h5>Description:</h5>
                        <div>
                            {!! $video->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-backend.ui.section-card>
@endsection
