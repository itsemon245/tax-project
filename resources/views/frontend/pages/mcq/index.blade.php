@extends('frontend.layouts.app')
@section('main')
    {{-- {{ dd($data->toArray()) }} --}}
    <form action="{{ route('result.store') }}" method="post">
        @csrf
        <div class="container my-5">
            <div>
                <div class="card-header text-center text-uppercase">
                    {{-- <b>MCQ Test</b> --}}
                </div>
                <div class="card-body">

                    @foreach ($data as $key => $item)
                        <input type="hidden" name="question[]" value="{{ $item->id }}">
                        <input type="hidden" value="{{ $item->name }}" name="questionName[]">
                        @php
                            $options = json_decode($item->choices, true);
                        @endphp
                        <input type="hidden" value="{{ $options['correct'] }}" name="answer[]">

                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <b>Quest #{{ ++$key }}</b>
                                    <br>
                                    <span class="text-muted">{{ $item->mark }}</span>
                                </div>
                                <div class="card-text mb-5 mt-3">
                                    {{ $item->name }}
                                </div>
                                <div class="row">



                                    {{-- {{dd($options)}} --}}

                                    @foreach ($options['options'] as $key => $option)
                                        <div class="col-md-6 col-lg-3 mb-3">

                                            @php
                                                $serial = ++$key;
                                            @endphp
                                            <div class="card">
                                                <div class="card-body">



                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexRadioDefault{{ $item->name . $serial }}" name="answer"
                                                            value="{{ $option }}">
                                                        <label class="form-check-label"
                                                            for="flexRadioDefault{{ $item->name . $serial }}">
                                                            {{ $option }}
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>
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

    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.form-check-input').on('change', function() {
                    $('.form-check-input').not(this).prop('checked', false);
                });
            });
        </script>
    @endpush
@endsection
