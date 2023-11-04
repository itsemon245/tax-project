<section id="counter-section" class="px-lg-5 px-3 my-5">
    <h4 class="text-center mb-5 fs-3">Our Achievments</h4>
    <div class="row justify-content-center px-2">
        @foreach ($achievements as $item)
            <div class="col-6 col-md-4 col-xl-3 col-xxl-2 mb-2 align-items-center justify-content-center">
                <div class="card rounded- h-100">
                    <div class="card-body p-2">
                        <div class="d-flex gap-3 align-items-center justify-content-center">
                            <img loading="lazy" class="rounded rounded-2" style="width:80px;height:80px;"
                                src="{{ useImage($item->image) }}" alt="">
                            <div class="d-flex flex-column justify-content-starr align-items-start">
                                <h2 class="counter-up m-0 text-primary" style="font-size: 32px; font-weight: 700;">
                                    {{ $item->count }}</h2>
                                <p class="m-0 fw-medium mt-2">{{ $item->title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>