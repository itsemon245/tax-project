@extends('frontend.layouts.app')
@section('main')
    <section class="">
        <div id="carouselExampleCaption" class="carousel slide pointer-event" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></li>
                {{-- <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=""></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=""></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class=""></li> --}}
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div style="background:url('{{ asset('frontend/assets/images/small/img-1.jpg') }}') no-repeat;" class="">

                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/small/img-3.jpg') }}" alt="..."
                        class="d-block img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white">Second slide label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/small/img-2.jpg') }}" alt="..."
                        class="d-block img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white">Third slide label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('frontend/assets/images/small/img-4.jpg') }}" alt="..."
                        class="d-block img-fluid">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-white">Third slide label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div> --}}
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaption" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaption" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </section>
@endsection
