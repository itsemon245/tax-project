@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Video', 'Show']" />

    <x-backend.ui.section-card name="Create Video">
        <x-backend.ui.button type="custom" class="btn-info btn-sm mb-2" :href="route('video.index') . '?course_id=' . $video->course_id">Back</x-backend.ui.button>

        <div class="row justify-content-center">
            <div class="col-8 mb-3">
                <video src="{{ $video->video }}" class="border rounded rounded-3 shadow shadow-sm"
                    style="object-fit: contain;aspect-ratio:16/9;" width="100%" controls>

                </video>
            </div>
            <div class="col-8">
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
