@extends('frontend.layouts.app')

@section('main')
    <section class="container my-5">
        <div class="d-flex flex-column align-items-center h-100">
            <h4 class="mb-4">All Courses</h4>
            <div class="row align-items-center">
                @foreach ($courses as $course)
                    <div class="col-md-6 mb-4">
                        <div class="border bg-light bg-gradient w-100 px-3 px-md-4 px-lg-5 py-3 rounded h-100">
                            <a class="text-dark" href="{{ route('course.show', $course?->id) }}">
                                <h5 class="text-success">{{ $course?->name }}</h5>
                                <p class="text-muted mb-1">
                                    {!! str($course?->description)->limit(200, '<span class="text-danger fw-bold">...</span>') !!}
                                </p>
                                <div class="text-success fs-5 fw-bold">Enroll at {{ $course?->price }} <span
                                        class="mdi mdi-currency-bdt"></span></div>

                            </a>
                            <div class="d-flex gap-3 flex-wrap align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2"><span
                                        class="mdi mdi-television-play"></span>{{ $course?->videos()->count() }}
                                    Videos</div>
                                {{-- <div class="d-flex align-items-center gap-2"><span class="mdi mdi-account-tie"></span>Highly Qualified Teacher</div> --}}
                                <a href="{{ $course?->preview }}" target="_blank"
                                    class="d-inline-flex align-items-center gap-2 p-0 m-0 text-dark"
                                    style="cursor: pointer;">
                                    <span class="mdi mdi-youtube text-danger"></span>
                                    <span style="text-decoration: underline;cursor: pointer;">Course Preview</span>
                                </a>
                            </div>
                            <div class="d-flex gap-3">
                                <a href="{{ route('payment.create', ['model' => Course::class, 'id' => $course?->id]) }}" class="btn btn-primary" style="font-weight: 500;">Enroll Now</a>
                                <a href="{{ route('course.show', $course?->id) }}" class="btn btn-secondary"
                                    style="font-weight: 500;">Course Details</a>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
