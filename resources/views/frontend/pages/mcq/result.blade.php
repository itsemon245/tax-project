@extends('frontend.layouts.app')

@section('main')
    <section class="container my-5">
        <div
            class="card {{ $result->has_passed ? 'bg-soft-success border-success shadow-success' : 'bg-soft-danger border-danger shadow-danger' }}">
            <div class="card-body" style="max-width: max-content;margin:0 auto;">
                @if ($result->has_passed)
                    <div class="text-success text-center fw-bold fs-5 p-3 rounded-3">
                        <div class="mdi mdi-check-decagram fs-1"></div>
                        Congratulations, You have passed the test!
                        <p class="text-center fw-bold fs-4">Score : {{ $result->score }}%</p>
                        <x-backend.ui.button type="custom" :href="route('home')" class="btn-sm btn-info">Go Back
                            Home</x-backend.ui.button>
                    </div>
                @else
                    <div class="text-danger text-center fw-bold fs-5 p-3 rounded-3">
                        <div class="mdi mdi-alert-decagram fs-1"></div>
                        Sorry, You have failed the test!
                        <p class="text-center fw-bold fs-4">Score : {{ $result->score }}%</p>
                        <x-backend.ui.button type="custom"
                            href="{{ route('mcq.index') . '?course_id=' . $result->exam->course->id }}"
                            class="btn-sm btn-info">Try Again</x-backend.ui.button>
                    </div>
                @endif
                <div class="row justify-content-between" style="">
                    <div class="col-sm-6">
                        <div class="text-dark fw-medium">
                            Total Marks : {{ $result->exam->total_marks }}
                        </div>
                        <div class="text-dark fw-medium">
                            Passing Marks : {{ $result->exam->passing_marks }}
                        </div>
                        <div class="text-dark fw-bold">
                            You Got : {{ $result->obtained_marks }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-dark fw-medium">
                            Questions : {{ $result->exam->questions->count() }}
                        </div>
                        <div class="text-dark fw-medium">
                            Right Answers : {{ $result->right }}
                        </div>
                        <div class="text-dark fw-medium">
                            Wrong Answers : {{ $result->wrong }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
