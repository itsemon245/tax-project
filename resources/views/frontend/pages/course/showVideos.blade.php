@extends('frontend.layouts.app')
@section('main')
    <style>
        .now-playing {
            background: var(--bs-primary-bg-subtle) !important;
            border: 2px solid var(--primary) !important;
        }

        .completed {
            background: var(--bs-dark-bg-subtle) !important;
            opacity: 0.8;
        }
    </style>
    @php
        $currentVideo = \App\Models\Video::where('id', request()->query('videos_id'))->first();
        // dd($currentVideo);
    @endphp
    <div class="container row mx-auto">
        <div class="col-md-12 mt-3">
            <h3 class="py-2 px-2 text-capitalize">{{ $currentVideo?->title }}</h3>
        </div>


        <div class="col-md-12">
            <div class="p-2 w-75 ratio ratio-16x9 mx-auto">
                <video class="w-full" controls>
                    <source src="{{ $currentVideo?->video }}" type="video/mp4">
                </video>
            </div>
            <div class="row p-3">
                <div class="col-md-12">
                    <div class="card-body">
                        <ul class="nav nav-pills navtab-bg nav-justified" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#about" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    About
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#reviews" data-bs-toggle="tab" aria-expanded="true" class="nav-link"
                                    aria-selected="false" role="tab" tabindex="-1">
                                    Reviews
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#discussion" data-bs-toggle="tab" aria-expanded="false" class="nav-link"
                                    aria-selected="true" role="tab" tabindex="-1">
                                    Discussion
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#courseContent" data-bs-toggle="tab" aria-expanded="false" class="nav-link active"
                                    aria-selected="true" role="tab" tabindex="-1">
                                    Course Content
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show" id="about" role="tabpanel">
                                @forelse ($descriptions as $description)
                                    <div>
                                        {{ $description->description }}
                                    </div>
                                @empty
                                    <div>
                                        No Descrpition here...
                                    </div>
                                @endforelse
                            </div>
                            <div class="tab-pane" id="reviews" role="tabpanel">
                                <x-review-section :item="$course" :reviews="$reviews" :slug="'course'" :can-review="$canReview" />
                            </div>
                            <div class="tab-pane" id="discussion" role="tabpanel">
                                <div class="row">
                                    <form action="#" method="post">
                                        <div class="col-md-12">
                                            <textarea name="" placeholder="Input your discussion content" cols="30" rows="10" class="form-control"></textarea>
                                            <x-backend.ui.button
                                                class="btn-primary btn-sm mt-2">Submit</x-backend.ui.button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane active" id="courseContent" role="tabpanel">
                                <div class="col-md-12">
                                    <div class="p-2 ">
                                        @forelse ($videos as $sectionName => $videos)
                                            <div class="card overflow-auto" style="max-height: 650px;">
                                                <div class="card-header py-1" role="button">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fw-bold">{{ $sectionName }}</span>
                                                        <span class="mdi mdi-chevron-down"></span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="">
                                                        @foreach ($videos as $key => $video)
                                                            <li
                                                                class="{{ $video->id == request()->query('videos_id') ? 'now-playing' : '' }} {{ auth()->user()->hasCompletedVideo($video->id)? 'completed': '' }} mb-3 d-flex gap-3 align-items-center  p-2 rounded border">
                                                                <div class="form-check form-check-success">
                                                                    <input class="form-check-input rounded-circle"
                                                                        data-url="{{ route('ajax.video.toggle', $video->id) }}"
                                                                        type="checkbox" value=""
                                                                        @checked(auth()->user()->hasCompletedVideo($video->id))>
                                                                </div>
                                                                <strong>{{ $key + 1 }}.</strong>
                                                                <a class="text-dark"
                                                                    href="{{ route('course.videos', $video->course_id) . '?videos_id=' . $video->id }}">
                                                                    <label class="form-check-label">
                                                                        {{ $video->title }}
                                                                    </label>
                                                                </a>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="bg-light text-center">
                                                    <div class="d-flex flex-column justify-content-center rounded"
                                                        style="height: 30vh;">
                                                        No Videos Found
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('customJs')
        <script>
            $(document).ready(function() {
                const headers = $('.card-header')
                headers.each((i, header) => {
                    $(header).click(e => {
                        let icon = $(header).find('.mdi');
                        icon.toggleClass('mdi-chevron-down')
                        icon.toggleClass('mdi-chevron-up')
                        $(header).next().slideToggle();
                    })
                })
            });
            $(document).ready(function() {
                $('.form-check-input').on('change', e => {
                    $.ajax({
                        type: "post",
                        url: e.target.dataset.url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    'icon': 'success',
                                    'title': 'Success',
                                    'text': response.message
                                })
                            } else {
                                Toast.fire({
                                    'icon': 'error',
                                    'title': 'Error',
                                    'text': response.message
                                })
                            }
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
