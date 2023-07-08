@extends('frontend.layouts.app')

@section('main')
    <section class="container my-5">
        <div class="d-flex flex-column align-items-center h-100">
            <h4 class="mb-4">All Courses</h4>
            <div class="row align-items-center">
                @foreach (range(1, 6) as $key)
                    <div class="col-md-6 mb-4">
                        <div class="border bg-light bg-gradient w-100 px-3 px-md-4 px-lg-5 py-3 rounded">
                            <a class="text-dark" href="{{ route('course.show', 1) }}">
                                    <h5 class="text-success">Tax Prepration course one</h5>
                                <p class="text-muted mb-1">
                                    Lorem ipsum dolor sit amet consectetur adipisicing Quam in maiores quidem iste
                                    animi natus earum magni. Autem, veritatis perspiciatis.
                                </p>
                                <span class="fs-5 fw-bold">Enroll at $99</span>

                            </a>
                            <div class="d-flex gap-3 flex-wrap align-items-center mb-3">
                                <div class="d-flex align-items-center gap-2"><span class="mdi mdi-television-play"></span>21
                                    Videos</div>
                                {{-- <div class="d-flex align-items-center gap-2"><span class="mdi mdi-account-tie"></span>Highly Qualified Teacher</div> --}}
                                <a class="d-inline-flex align-items-center gap-2 p-0 m-0 text-dark" style="cursor: pointer;">
                                    <span class="mdi mdi-youtube text-danger"></span>
                                    <span style="text-decoration: underline;cursor: pointer;">Course Preview</span>
                                </a>
                            </div>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-primary" style="font-weight: 500;">Enroll Now</a>
                                <a href="{{ route('course.show', 1) }}" class="btn btn-secondary" style="font-weight: 500;">Course Details</a>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
