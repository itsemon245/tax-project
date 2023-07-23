@extends('frontend.layouts.app')
@section('main')
    <div class="container px-4 py-4 mt-4">
        <div class="row">
            <div class="col-md-8">
                <p class="text-primary">
                    Tax Preparation Course
                </p>
                <h3 class="">
                    {{ $caseStudies[0]->title }}
                </h3>
                <div class="mt-3 mb-3">
                    {!! $caseStudies[0]->page_description !!}
                </div>
            </div>
            <div class="col-md-4 ">
                <div class=" card overflow-hidden">
                    <img class="shadow-lg" src="{{ $caseStudies[0]->image }}" alt=""
                        width="100%" height="300px">
                </div>
            </div>
        </div>
        <div class="">
            <h3 class="text-center mt-5">Case Study Lab</h3>
            <div class="mt-3 d-flex flex-wrap gap-3 justify-content-center">
                @foreach ($caseStudies as $caseStudy)
                    <div class="min-w-lg">
                        <div class="px-4 py-4 mb-3 card">
                            <div class="card-body">
                                <h3>Basic</h3>
                                <h3>500 &#2547; <span>Monthly</span></h3>
                                <small class="badge p-2 bg-success" style="font-weight: 500;">Monthly 4 Orders
                                    Upload</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <p class="bg-primary text-black p-2 text-center">Choose</p>
                                </div>
                                <p class="mt-3 fw-bold">What your will get: <small
                                        class="bg-primary text-white p-1 rounded">Monthly 4 Orders Upload</small></p>
                                <div>
                                    <ul class="px-3" style="list-style: decimal;">
                                        @foreach (range(1, 5) as $item)
                                            <li class="row justify-content-between mb-1">
                                                <span class="col-10">list item {{$item}}</span>
                                                <div class="col-2">
                                                    <span class="badge bg-light p-2 text-dark w-100" style="font-weight: 500;">{{$item * random_int(1,10)}}</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
