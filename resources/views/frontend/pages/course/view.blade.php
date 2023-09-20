@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="card border-0 my-5">
            <div class="card-body p-0">
                <div class="p-3 mb-5">
                    <div class="row justify-content-center align-items-center gap-3">
                        <div class="col-md-6">
                            <div class="h-100">
                                <p class="fw-bold text-success">{{ $course->name }}</p>
                                <h4 class="">{{ $course->page_title }}</h4>
                                <p class="">{!! $course->description !!}</p>
                                {{-- <x-backend.ui.button href="{{ route('payment.create', ['model' => Course::class, 'id' => $course->id]) }}" class="btn-success text-capitalize">Enroll Now
                                </x-backend.ui.button> --}}
                                <a href="{{ route('payment.create', ['model' => Course::class, 'id' => $course->id]) }}" class="btn-success btn  text-capitalize">Enroll Now</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="h-100">
                                <img loading="lazy" class="w-100 rounded rounded-3" style="aspect-ratio:4/2.5;object-fit:cover"
                                    src="{{ $course->page_banner }}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mb-3 px-3">
                    @foreach ($course->page_cards as $key => $card)
                        <div class="col-md-6 mb-2 mb-md-0">
                            <div class="card h-100 border-0 rounded-3">
                                <div class="card-body">
                                    <h5 class="text-center">{{ $card->title }}</h5>
                                    <p class="text-justify px-2">{{ $card->description }}</p>
                                    <div class="d-flex justify-content-center text-center">
                                        @if ($key == 0)
                                            {{-- <x-backend.ui.button type="custom" href="#" class="btn-primary">Enroll
                                                Now
                                            </x-backend.ui.button> --}}
                                            <a href="{{ route('payment.create', ['model' => Course::class, 'id' => $course->id]) }}" class="btn-primary btn  text-capitalize">Enroll Now</a>
                                        @else
                                            <x-backend.ui.button type="custom"
                                                href="{{ route('mcq.index') . '?course_id=' . $course->id }}" class="btn-dark">
                                                Start The Assesment
                                            </x-backend.ui.button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div style="box-shadow:none;" class="card border-0 mb-3">
                    <div class="card-body">
                        <h4 class="text-center">Learn more about the course.</h4>
                        <p class="mt-3 text-center">
                            {{ $course->page_learn_more->description }}
                        </p>
                        <div class="row mb-3 align-items-center justify-content-center">
                            @foreach ($course->page_learn_more->images as $image)
                                <div class="col-3 mb-3 mb-md-0">
                                    <img loading="lazy" class="w-100 rounded rounded-3 shadow-sm" src="{{ $image }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <a href="{{ route('payment.create', ['model' => Course::class, 'id' => $course->id]) }}" class="btn-info d-block btn  text-capitalize">Enroll Now</a>
                            {{-- <x-backend.ui.button class="btn-info d-block">Enroll now</x-backend.ui.button> --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <embed class="w-100 rounded rounded-3 shadow border" style="aspect-ratio:16/9;"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </embed>
                </div>
                <div style="box-shadow:none;" class="card border-0 my-3">
                    <div class="card-body">
                        <div class="row justify-content-center justify-content-md-between">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h5>Tax Course Included:</h5>
                                <div class="">
                                    {!! $course->includes !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Graduates Receive:</h5>
                                <div class="">
                                    {!! $course->graduates_receive !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="box-shadow:none;" class="card border-0 mt-2">
                    <div class="card-header text-center">
                        <h5>Explore Course Topics</h5>
                        <p>{{ $course->page_topics->description }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($course->page_topics->lists as $list)
                                <div class="col-md-4">
                                    <div style="box-shadow:none;" class="card border-0 h-100">
                                        <div class="card-body">
                                            {!! $list !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('customJs')
    @endpush
@endsection
