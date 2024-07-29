@extends('frontend.layouts.app')
<style>
    .active {
        background: var(--bs-primary);
        color: var(--dark);
    }

    .form-check-label {
        transition: all 250ms ease-in;
    }
</style>
@section('main')
    @if ($exam !== null)
        <form action="{{ route('mcq.submit', $exam->id) }}" method="post">
            @csrf
            <div class="container my-5">
                <div>
                    <div class=" fs-5 text-center mb-2 text-success">
                        <b>Test For {{ $exam->name }}</b>
                    </div>
                    <div class="card-body">

                        @foreach ($exam->questions as $key => $question)
                            <input type="hidden" name="questions[]" value="{{ $question->id }}">
                            <div class="card mb- border-0">
                                <div class="card-body">
                                    <div>
                                        <div class="">
                                            <b class="me-2">#Q.{{ ++$key }}</b>
                                            {{ $question->name }}
                                        </div>
                                        <span class="text-muted">Mark: {{ $question->mark }}</span>
                                    </div>

                                    <div class="row p-2">
                                        @foreach ($question->choices->options as $i => $option)
                                            <div class="col-sm-3 col-6 mb-2 mb-sm-0">
                                                <label
                                                    class="form-check-label d-flex gap-2 p-3 bg-light bg-gradient rounded-3"
                                                    for="q-{{ $key }}-option-{{ $i }}">
                                                    <input class="form-check-input" type="radio"
                                                        id="q-{{ $key }}-option-{{ $i }}"
                                                        name="question_{{ $key }}_answer"
                                                        value="{{ $option }}" required>
                                                    {{ $option }}
                                                </label>
                                                @error('question_{{ $key }}_answer')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer text-end">
                        <x-backend.ui.button class="btn-danger">Cancel</x-backend.ui.button>
                        <x-backend.ui.button class="btn-primary">Submit</x-backend.ui.button>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="m-3 m-md-5">
            <div class="bg-light text-center m-3 m-md-5">
                <div class="d-flex flex-column justify-content-center rounded" style="height: 30vh;">
                    No exams added by admin!
                </div>
            </div>
        </div>
    @endif


    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.form-check-input').on('change', e => {
                    $(e.target)
                        .parent()
                        .parent()
                        .siblings()
                        .find('label')
                        .removeClass('active')
                        .addClass('bg-light');

                    $(e.target)
                        .parent()
                        .toggleClass('active')
                        .removeClass('bg-light');
                })
            });
        </script>
    @endpush
@endsection
