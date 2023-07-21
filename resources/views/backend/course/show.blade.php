@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'View']" />
    <x-backend.ui.section-card name="{{ $course->name }} Preview">
        <div class="px-2 mx-2 px-lg-5 mx-lg-5">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row justify-content-center align-items-center gap-3">
                        <div class="col-md-6">
                            <div class="h-100">
                                <p class="fw-bold text-success">{{ $course->name }}</p>
                                <h4 class="">A meaningful carrer starts here.</h4>
                                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam in maiores
                                    quidem
                                    iste
                                    animi natus earum magni. Autem, veritatis perspiciatis. Earum nobis provident quisquam
                                    nulla
                                    assumenda quam fugiat, voluptatem numquam eligendi, neque tenetur corrupti sed?
                                    Recusandae
                                    suscipit
                                    ullam libero</p>
                                <x-backend.ui.button class="btn-success text-capitalize">Enroll Now
                                </x-backend.ui.button>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="h-100">
                                <img class="w-100 rounded rounded-3" style="aspect-ratio:4/3;"
                                    src="{{ $course->page_banner }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-3">
                @foreach ($course->page_cards as $key => $card)
                    <div class="col-md-6">
                        <div class="card h-100 shadow rounded-3">
                            <div class="card-body">
                                <h3 class="text-center">{{ $card->title }}</h3>
                                <p class="text-justify px-2">{{ $card->description }}</p>
                                <div class="d-flex justify-content-center text-center">
                                    <a href="{{ route('mcq.test') }}">
                                        <x-backend.ui.button class="mb-3 btn-dark  d-block">Start the assessment
                                        </x-backend.ui.button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="text-center">Learn more about the course.</h2>
                    <p class="mt-3 text-center">
                        {{ $course->page_learn_more->description }}
                    </p>
                    <div class="row mb-2">
                        @foreach ($course->page_learn_more->images as $image)
                            <div class="col-md-4 align-self-center justify-self-center">
                                <img class="w-75 h-75 rounded rounded-3 shadow" src="{{ $image }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        <x-backend.ui.button class="mb-3 btn-info d-block">Enroll now</x-backend.ui.button>
                    </div>
                </div>
            </div>
            <div class="card">
                <embed class="w-100 rounded rounded-3 shadow border" height="480px"
                    src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </embed>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class="col-md-5">
                            <h4>Tax Course Included:</h4>
                            <div class="">
                                {!! $course->includes !!}
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h4>Graduates Receive:</h4>
                            <div class="">
                                {!! $course->graduates_receive !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                    <h4>Explore Course Topics</h4>
                    <p>{{ $course->page_topics->description }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($course->page_topics->lists as $list)
                            <div class="col-md-4">
                                <div class="card h-100">
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

    </x-backend.ui.section-card>


    @push('customJs')
    @endpush
@endsection
