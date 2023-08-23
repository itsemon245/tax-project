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
                            <th class="">Price</th>
                            <th class="">Trainer</th>
                            <th class="" style="width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>

                                    <a href="{{ route('video.byCourse', $course->id) }}"
                                        class="d-flex align-items-start gap-2 text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $course->name }}</div>
                                            <div>{{ $course->videos()->count() }} Videos</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{ $course->price }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-start gap-2">
                                        <div>
                                            <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}"
                                                class="rounded rounded-circle" width="48px" height="48px" alt="">
                                        </div>
                                        <div>
                                            <div class="fw-medium">
                                                <a href="javascript: void(0);"
                                                    class="text-reset">{{ fake()->name('female') }}</a>
                                            </div>
                                            <span>{{ fake()->jobTitle() }}</span>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div>
                                        <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark "
                                            href="#">
                                            Preview
                                        </x-backend.ui.button>
                                    </div>
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
