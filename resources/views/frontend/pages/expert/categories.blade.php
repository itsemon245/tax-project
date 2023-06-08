@extends('frontend.layouts.app')

@pushOnce('customCss')
    <style>
        .custom-grid {
            display: grid;
            max-width: 100%;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr) );
            justify-content: center;
            align-items: center;
            gap: 1.25rem;
        }
        @media (max-width: 470px) {
            .custom-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr) );
            }
        }
        
    </style>
@endPushOnce
@section('main')
<div id="app_header">
    <div class="container">
        <div class="row">
            <div class="app_header_content text-center">
                <h2>Choose an expert Catgory?</h2>
            </div>
        </div>
            <div class="container mb-3">
                <div class="custom-grid">
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    <div class="bg-light d-flex justify-content-center align-items-center rounded rounded-3">
                        <a href="{{route('expert.browse')}}" class="text-dark d-flex flex-column align-items-center">
                            <img src="{{ asset('frontend/assets/images/Frame.png') }}" alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
    </div>
</div>


@endsection