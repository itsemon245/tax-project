<section class="">
    <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            <div class="carousel-item active">
                <div class="row align-items-center" style="position: relative;">
                    <div class="hero-content" style="position: absolute;left:15%;max-width:320px;">
                        <h3 class="mb-0" style="font-weight: 800;">Save Up To 40% With Early Bird Prices</h3>
                        <p class="my-1" style="font-size:13px;font-weight:500;">Get a sneek peek now at great
                            pricing</p>
                        <a href="#" class="btn btn-primary text-dark" style="font-weight:600;">
                            Get Started
                        </a>
                    </div>
                    <img class="hero-image" src="{{ asset('frontend/assets/images/small/img-2.jpg') }}" alt=""
                        crossOrigin="anonymous" style="height: 250px; object-fit: cover;">
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
