@extends('frontend.layouts.app')
@section('main')
    <section class="">
        <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class=""></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class=""></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" class=""></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active">
                    <div class="row" style="position: relative;">
                        <div class="hero-content"
                            style="position: absolute;top:50%; left:10%;transform: translate(50px, -50px);max-width:300px;">
                            <h1 class="">Save Up To 40% With Early Bird Prices</h1>
                            <p>Get a sneek peek now at great pricing</p>
                            <a href="#" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                        <img class="hero-image" src="{{ asset('frontend/assets/images/small/img-2.jpg') }}" alt=""
                            crossOrigin="anonymous" style="height: 360px; object-fit: cover;">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row" style="position: relative;">
                        <div class="hero-content"
                            style="position: absolute;top:50%; left:10%;transform: translate(50px, -50px);max-width:300px;">
                            <h1 class="">Save Up To 40% With Early Bird Prices</h1>
                            <p>Get a sneek peek now at great pricing</p>
                            <a href="#" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                        <img class="hero-image" src="{{ asset('frontend/assets/images/small/img-5.jpg') }}" alt=""
                            crossOrigin="anonymous" style="height: 360px; object-fit: cover;">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row" style="position: relative;">
                        <div class="hero-content"
                            style="position: absolute;top:50%; left:10%;transform: translate(50px, -50px);max-width:300px;">
                            <h1 class="">Save Up To 40% With Early Bird Prices</h1>
                            <p>Get a sneek peek now at great pricing</p>
                            <a href="#" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                        <img class="hero-image" src="{{ asset('frontend/assets/images/small/img-1.jpg') }}" alt=""
                            crossOrigin="anonymous" style="height: 360px; object-fit: cover;">
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row" style="position: relative;">
                        <div class="hero-content"
                            style="position: absolute;top:50%; left:10%;transform: translate(50px, -50px);max-width:300px;">
                            <h1 class="">Save Up To 40% With Early Bird Prices</h1>
                            <p>Get a sneek peek now at great pricing</p>
                            <a href="#" class="btn btn-primary">
                                Get Started
                            </a>
                        </div>
                        <img class="hero-image" src="{{ asset('frontend/assets/images/small/img-4.jpg') }}" alt=""
                            crossOrigin="anonymous" style="height: 360px; object-fit: cover;">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </section>

    @push('customJs')
        <script>
            const images = document.querySelectorAll('.hero-image')
            images.forEach(image => {
                image.addEventListener('load', () => {
                    const color = extractColor.getImageColor(image)
                    const textColor = extractColor.getContrastColor(color)
                    image.parentNode.style.color = textColor
                })
            });
        </script>
    @endpush
@endsection
