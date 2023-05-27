@props(['banners'])
<section class="">
    <div id="carouselExampleIndicators" class="carousel slide pointer-event" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ( $banners as $key => $banner)
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                    class="{{ $banners[0]->id === $banner->id ? 'active' : '' }}"
                    aria-current="{{ $banners[0]->id === $banner->id ? 'true' : 'false' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $banners[0]->id === $banner->id ? 'active' : '' }}">
                    <div class="row" style="position: relative;">
                        <div class="d-flex align-items-center" style="position: absolute;inset:0;padding-left:15%;">
                            <div id="hero-content-{{ $banner->id }}" class="hero-content" style="max-width:320px;">
                                <h3 class="mb-0" style="font-weight: 800;font-size:40px;">{{ $banner->title }}
                                </h3>
                                <p class="my-1" style="font-size:13px;font-weight:500;">{{ $banner->sub_title }}</p>
                                <a href="{{ $banner->button }}" class="btn btn-primary text-dark"
                                    style="font-weight:600;">
                                    Get Started
                                </a>
                            </div>
                        </div>
                        <img id="{{ $banner->id }}" class="hero-image" src="{{ useImage($banner->image_url) }}"
                            alt="" crossOrigin="anonymous" style="height: 350px; object-fit: cover;"
                            loading="lazy">
                    </div>
                </div>
            @endforeach
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
        // const images = $('.hero-image')
        // $.each(images, (index, image) => {
        //     image.addEventListener('load', () => {
        //         const color = extractColor.getImageColor(image)
        //         const textColor = extractColor.getContrastColor(color)
        //         console.log(textColor);
        //         $(`#hero-content-${image.id}`).css('color', `${textColor}!important`)
        //         // console.log( $(`#hero-content-${image.id}`).css('color'));
        //     })
        // });
    </script>
@endpush
