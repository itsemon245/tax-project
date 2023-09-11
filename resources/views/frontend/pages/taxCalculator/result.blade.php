@extends('frontend.layouts.app')
@section('main')
    <style>
        .check-active {
            background: var(--bs-primary);
            color: var(--dark);
        }

        .form-check-label {
            transition: all 150ms ease-in-out;
        }
    </style>
    <section class="my-5 container">
        <div class="card bg-soft-success border-success shadow-success">
            <div class="card-body" style="max-width: max-content;margin:0 auto;">
                <div class="text-success text-center fw-bold fs-5 p-3 rounded-3">
                    <div class="mdi mdi-check-decagram fs-1"></div>
                    Showing results based on your inputs:
                    <p class="text-center fw-bold fs-4">Tax : {{ $result->tax }}৳</p>
                    <p class="text-center fw-bold fs-3 my-0">Others : @if (!$result->others)
                            <span class="fw-medium">
                                No others taxes
                            </span>
                        @endif
                    <ul class="list-unstyled mb-0">
                        @foreach ($result->others as $key => $value)
                            <li>
                                <span class="fw-medium">{{ $key }} : </span>
                                <span class="fw-medium">{{ $value }} ৳</span>
                            </li>
                        @endforeach
                    </ul>
                    </p>
                    <x-backend.ui.button type="custom" :href="route('tax.calculator')" class="btn-sm btn-info">Calculate
                        again</x-backend.ui.button>
                </div>

                {{-- <div class="row justify-content-between" style="">
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
                </div> --}}
            </div>
        </div>
    </section>
    <!-- end row-->
@endsection
