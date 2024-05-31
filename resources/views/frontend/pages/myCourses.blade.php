@extends('frontend.layouts.app')
@section('main')
    <div class="container my-5">
        <h3 class="text-center text-muted">My Courses:</h3>
        <div class="row">
            @if (count($courses) > 0)
                <table class="table table-responsive table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th class="">No</th>
                            <th class="">Name</th>
                            <th class="" style="width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>

                                    <a href="#"
                                        class="d-flex align-items-start gap-2 text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $course->name }}</div>
                                            <div class="d-flex mt-2 gap-2 align-items-center">
                                                <span data-feather="tv" class="icon-dual w-4 h-4"></span>
                                                {{ $course->videos?->count() }} Case Studies
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                @php
                                    $video = $course->videos->first();
                                @endphp
                                <td>
                                    @if ($video)
                                        @if ($course->isPurchased)
                                                <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark"
                                                    href="{{ route('course.videos', $course->id) . '?videos_id=' . $video->id }}">
                                                    Lessons
                                                </x-backend.ui.button>
                                        @else
                                            <h5 class="w-full text-warning font-bold text-center">
                                                Pending
                                            </h5>
                                        @endif
                                    @else
                                        No Video's Found
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <section class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                    <div class="">
                        <p>You havn't purchased any courses yet!</p>
                        <a href="{{ route('course.index') }}" class="btn btn-primary rounded-3 w-100 mx-auto">Explore
                            Courses</a>
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection
