<section class="mt-5 py-5" style="background: #474646;">
    <h3 class="text-center text-light">Our Valuable Partners</h3>
    <div class="scroll-wrapper">
        <span id="nextBtn" class="ti-arrow-circle-left icon"></span>
        <div class="media-scroller snaps-inline">
            <div class="media-elements">
                <div class="p-3 bg-light d-flex align-items-center gap-3 rounded-3">
                    <img class="rounded rounded-circle" style="max-width: 120px;"
                        src="{{ asset('backend/assets/images/users/user-5.jpg') }}" alt="">
                    <p class="mb-0 d-inline" style="text-align:justify;">Lorem ipsum dolor sit amet consectetur.
                        Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="media-elements">
                <div class="p-3 bg-light d-flex align-items-center gap-3 rounded-3">
                    <img class="rounded rounded-circle" style="max-width: 120px;"
                        src="{{ asset('backend/assets/images/users/user-5.jpg') }}" alt="">
                    <p class="mb-0 d-inline" style="text-align:justify;">Lorem ipsum dolor sit amet consectetur.
                        Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="media-elements">
                <div class="p-3 bg-light d-flex align-items-center gap-3 rounded-3">
                    <img class="rounded rounded-circle" style="max-width: 120px;"
                        src="{{ asset('backend/assets/images/users/user-5.jpg') }}" alt="">
                    <p class="mb-0 d-inline" style="text-align:justify;">Lorem ipsum dolor sit amet consectetur.
                        Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
        <span id="prevBtn" class="ti-arrow-circle-right icon"></span>
    </div>
</section>

@push('customCss')
    <style>
        .scroll-wrapper {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 2rem 4rem;
        }

        @media (min-width: 1020px) {
            .scroll-wrapper {
                padding: 2rem 10rem;
            }
        }

        .media-scroller {
            display: grid;
            grid-auto-flow: column;
            grid-tem-columns: 33%;
            overflow-x: auto;
            gap: 1rem;
            overscroll-behavior-inline: contain;
            scroll-behavior: smooth;
        }

        #nextBtn,
        #prevBtn {
            background: none;
            border: none;
            padding: 0;
        }

        .icon {
            color: var(--bs-primary);
            font-size: 28px;
            margin: 0 1rem;
            cursor: pointer;
        }

        .media-scroller::-webkit-scrollbar {
            appearance: none;
            display: none;
        }

        .snaps-inline {
            scroll-snap-type: inline mandatory;
            scroll-padding-inline: 10rem;
        }

        .snaps-inline>* {
            scroll-snap-align: center;
        }
    </style>
@endpush

@push('customJs')
    <script>
        $(document).ready(function() {
            const container = document.querySelector('.media-scroller');
            const next = document.getElementById('nextBtn')
            const prev = document.getElementById('prevBtn')
            container.addEventListener('wheel', e => {
                e.preventDefault();
                console.log(e.deltaY);
                container.scrollLeft += e.deltaY;
            })

            next.addEventListener('click', () => {
                container.scrollLeft += 266.66668701171875;
            })
            prev.addEventListener('click', () => {
                container.scrollLeft -= 266.66668701171875;
            })
        });
    </script>
@endpush
