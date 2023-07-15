@extends('frontend.layouts.app')
@section('main')
    <div class="container px-4 py-4 mt-4">
        <div class="row">
            <div class="col-md-8">
                <p class="text-primary">
                    Tax Preparation Course
                </p>
                <h3 class="">
                    This Should Be A Title Heading
                </h3>
                <p class="mt-3 mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero nulla eaque repellat iusto atque sapiente
                    ipsum, pariatur voluptatem aliquid ea sunt, vitae ad, assumenda reprehenderit placeat omnis voluptate
                    rem earum. Voluptatum esse iure dolorum tenetur quam. Dolores perferendis consequuntur quam? Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Vitae, fugit dolores harum amet, ipsum incidunt ut labore
                    mollitia hic fugiat alias beatae aperiam, quam rem. Quidem distinctio vitae fugiat nesciunt porro, unde
                    cumque obcaecati nemo voluptatibus ipsum quis, eaque magnam?
                </p>
            </div>
            <div class="col-md-4 ">
                <div class=" card overflow-hidden">
                    <img class="shadow-lg" src="{{ asset('frontend/assets/images/attached-files/img-1.jpg') }}" alt=""
                        width="100%" height="300px">
                </div>
            </div>
        </div>
        <div class="">
            <h3 class="text-center mt-5">Case Study Lab</h3>
            <div class="mt-3 d-flex flex-wrap gap-3 justify-content-center">
                @foreach (range(1, 3) as $key)
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
