<section class="px-lg-5 px-2 my-5">
    <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">Services</h4>
    <div class="row mx-lg-5 mx-2 service-category justify-content-center">
        @foreach ($customServices as $sub)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="d-flex flex-column align-items-center border rounded shadow-sm p-2 h-100">
                    <a href="{{ $sub->link }}">
                        <img loading="lazy" style="width:clamp(80px, 120px, 150px);aspect-ratio:1/1;"
                            class="rounded rounded-circle mb-3" src="{{ $sub->image?->url }}" alt="">
                    </a>
                    <a class="text-dark text-capitalize" href="{{ $sub->link }}">
                        <h6>{{ $sub->title }}</h6>
                    </a>
                    <a href="{{ $sub->link }}" class="text-center text-muted">{{ $sub->description }}</a>
                </div>
            </div>
        @endforeach

    </div>
</section>
