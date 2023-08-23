@extends('frontend.layouts.app')
@section('main')
    <div class="container px-4 py-4 mt-4">
        <div class="row">
            <div class="col-md-8">
                <h3 class="">
                    {{ $packages[0]->title }}
                </h3>
                <div class="mt-3 mb-3">
                    {!! $packages[0]->page_description !!}
                </div>
            </div>
            <div class="col-md-4 ">
                <div class=" card overflow-hidden">
                    <img class="shadow-lg" src="{{ $packages[0]->image }}" alt="" width="100%" height="300px">
                </div>
            </div>
        </div>
        <div class="">
            <h3 class="text-center mt-5">Case Study Lab</h3>
            <div class="mt-3 d-flex flex-wrap gap-3 justify-content-center">
                @foreach ($packages as $package)
                    <div class="min-w-lg">
                        <div class="px-4 py-4 mb-3 card">
                            <div class="card-body">
                                <h3>{{ $package->name }}</h3>
                                <h3>{{ $package->price }} &#2547; <span>{{ $package->billing_type }}</span></h3>
                                <small class="badge p-2 bg-success" style="font-weight: 500;">Monthly {{ $package->limit }}
                                    Orders
                                    Upload</small>
                                <div class="d-flex justify-content-center mt-3">
                                    <a class="bg-primary text-black p-2 text-center"
                                        href="{{ route('payment.create', ['model' => CaseStudyPackage::class, 'id' => $package->id]) }}">Choose</a>
                                </div>
                                <p class="mt-3 fw-bold">What your will get: <small
                                        class="bg-primary text-white p-1 rounded">Monthly {{ $package->limit }} Orders
                                        Upload</small></p>
                                <div>
                                    <ul class="px-3" style="list-style: decimal;">
                                        @foreach ($package->caseStudyCategories as $category)
                                            <li class="row justify-content-between mb-1">
                                                <span class="col-10">{{ $category->name }}</span>
                                                <div class="col-2">
                                                    <span class="badge bg-light p-2 text-dark w-100"
                                                        style="font-weight: 500;">{{ $category->caseStudies()->count() }}</span>
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
