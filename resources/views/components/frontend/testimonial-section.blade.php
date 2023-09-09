<section class="mt-5 py-5" style="background: #474646;">
    <h3 class="text-center text-light">Our Valuable Partners</h3>
    <div class="scroll-wrapper">
        <span id="next" class="ti-arrow-circle-left custom-icon"></span>
        <div class="media-scroller snaps-inline">
            @foreach ($testimonials as $item)
            <div class="d-flex gap-3 align-items-start border border-3 p-3 rounded-3 mb-3 text-light">
                <img src="{{ useImage($item->user->image_url) }}" alt="img" width="64px" height="64px" class=" rounded-circle shadow-4-strong d-block">
                <div>
                    <div class="mb-2">
                        <h6 class="mb-0">{{ $item->user->name }}</h6>
                        <small>
                            <div class="rating">  
                                <span class="fas fa-star" style="color:var(--bs-yellow);"></span>
                                <span class="fas fa-star" style="color:var(--bs-yellow);"></span>
                                <span class="fas fa-star" style="color:var(--bs-yellow);"></span>
                                <span class="fas fa-star" style="color:var(--bs-gray-200);"></span>
                                <span class="fas fa-star" style="color:var(--bs-gray-200);"></span>
                                </div>
                        </small>
                    </div>
                    <small class="mb-0">{!! Str::limit($item->comment, 30, '...') !!}</small>
                </div>
            </div>

            @endforeach


            {{-- <div class="media-elements">
                <div class="p-3 d-flex align-items-center gap-3" style="width: 100%;" >
                    <img class="rounded rounded-circle image" style="width: 100px;" src="{{ asset('frontend/assets/images/flags/russia.jpg') }}" alt="">
                    <p class="comment">
                        {{ $item->comment }}
                    </p>
                </div>
            </div> --}}
        </div>
        <span id="prev" class="ti-arrow-circle-right custom-icon"></span>
    </div>
</section>

@push('customCss')
    <style>
        .scroll-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
        }


        @media (min-width: 970px) {
            .scroll-wrapper {
                padding: 1rem 5rem
            }
        }

        @media (min-width: 640px) {
            .scroll-wrapper {
                gap: 1rem;
                padding: 2rem;
            }
        }

        .media-scroller {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            overscroll-behavior-inline: contain;
            scroll-behavior: smooth;
        }

        .media-elements {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 10px;
        }

        .media-elements .comment {
            width: 100px;
            display: inline;
            margin: 0;
            text-align: justify;
        }

        .media-elements .image {
            max-width: 70px;
        }

        @media (min-width:600px) {
            .media-elements .image {
                max-width: 120px;
            }

            .media-elements .comment {
                width: 200px
            }
        }

        #next,
        #prev {
            background: none;
            border: none;
            padding: 0;
        }

        .custom-icon {
            color: var(--bs-primary);
            font-size: 28px;
            margin: 0 5px;
            cursor: pointer;
        }

        .media-scroller::-webkit-scrollbar {
            appearance: none;
            display: none;
        }

        .snaps-inline {
            scroll-snap-type: inline mandatory;
            scroll-padding-inline: 5rem;
        }

        .snaps-inline>* {
            scroll-snap-align: start;
        }
    </style>
@endpush

@push('customJs')
    <script>
        const container = document.querySelector('.media-scroller');
        const next = document.getElementById('next')
        const prev = document.getElementById('prev')
        const scrollElementWidth = parseInt($('.media-elements').css('width').split('px')[0])
        const scrollUnit = scrollElementWidth+20;
        container.addEventListener('wheel', e => {
            e.preventDefault();
            container.scrollLeft += e.deltaY;
        })

        next.addEventListener('click', () => {
            container.scrollLeft -= scrollUnit;
        })
        prev.addEventListener('click', () => {
            container.scrollLeft += scrollUnit;
        })
    </script>
@endpush
