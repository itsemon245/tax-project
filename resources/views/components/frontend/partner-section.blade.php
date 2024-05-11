@props(['partners' => []])

<section class="mt-5 py-5" style="background: #474646;">
    <h3 class="text-center text-light">Our Valuable Partners</h3>
    <div class="scroll-wrapper">
        <span id="next" class="ti-arrow-circle-left custom-icon"></span>
        <div class="media-scroller snaps-inline">
            {{-- Patner section is starting --}}
            @foreach ($partners as $partner)
                <div class="media-elements">
                    <div class="d-flex align-items-start gap-3 p-3">
                        <div>
                            <img loading="lazy" class="border image rounded-circle" src="{{ useImage($partner->image) }}"
                                width="80px" height="80px" style="object-fit: cover" alt="">

                        </div>
                        <div>
                            <h4 class="mb-0">{{ $partner->name }}</h4>
                            <small class="mb-0 text-muted">{{ $partner->designation }}</small>
                            <div class="d-flex mb-0 mt-2 text-primary">
                                <a href="mailto:{{ $partner->email }}">
                                    <span class="mdi mdi-email font-16 me-2"></span><span>{{ $partner->email }}</span>
                                </a>
                            </div>
                            <a href="tel:{{ $partner->phone }}">
                                <span class="mdi mdi-phone font-16 me-2"></span><span>{{ $partner->phone }}</span>
                            </a>
                            <div class="d-flex text-primary">
                                <a href="{{ $partner->facebook }}">
                                    <i class="fe-facebook me-3"></i>
                                </a>
                                <a href="{{ $partner->twitter }}">
                                    <i class="fe-twitter me-3"></i>
                                </a>
                                <a href="{{ $partner->linkedin }}">
                                    <i class="fe-linkedin me-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- <div class="media-elements">
                <div class="p-3 d-flex align-items-center gap-3" style="width: 100%;" >
                    <img loading="lazy" class="rounded rounded-circle image" style="width: 100px;" src="{{ asset('frontend/assets/images/flags/russia.jpg') }}" alt="">
                    <p class="comment">
                        {{ $item->comment }}
                    </p>
                </div>
            </div> --}}
        </div>
        <span id="prev" class="ti-arrow-circle-right custom-icon"></span>
    </div>
</section>
