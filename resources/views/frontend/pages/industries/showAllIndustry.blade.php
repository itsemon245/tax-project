@extends('frontend.layouts.app')
@section('main')
    <section class="row px-lg-5 px-2 mt-5">
        <h3 class="text-center">Industries We Serve</h3>
        <div class="d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="mb-3">
                        {!! $industries[0]->page_description !!}
                    </div>
                    @foreach ($industries as $industry)
                        <div class="col-md-4 col-sm-6 mb-3">
                            <div class="border bg-light w-100 px-0 px-md-3 px-lg-5 py-3 rounded h-100">
                                <a class="text-dark" href="{{ route('industry.page.show', $industry->id) }}">
                                    <div class="d-flex">
                                        <img loading="lazy" style="width:64px;" src="{{ useImage($industry->image) }}" class="rounded"
                                            alt="{{ $industry->title }}" />
                                        <h6 class="px-3">{{ $industry->title }}</h6>
                                    </div>
                                    <p class="tex-justify text-muted mt-2" style="max-width: 35ch;">{!! $industry->intro !!}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

@push('customJs')
    <script>
        var counter = 0
        window.onload = () => {
            if (!counter && isScrolledIntoView(document.getElementById("counter-section"))) {
                counter = 1
                counterUp()
            }
        }

        window.addEventListener("scroll", () => {
            console.log(counter)
            if (!counter && isScrolledIntoView(document.getElementById("counter-section"))) {
                counter = 1
                counterUp()
            }
            // else if (!isScrolledIntoView(document.getElementById("counter-section")) && counter) {
            //     counter = 0
            // }
        })

        function isScrolledIntoView(el) {
            let rect = el.getBoundingClientRect();
            let elemTop = rect.top;
            let elemBottom = rect.bottom;

            let isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
            // let isVisible = elemTop < window.innerHeight && elemBottom >= 0;
            return isVisible;
        }

        function counterUp() {
            $('.counter-up').each(function() {
                let countTo = $(this).text()
                $(this).prop('Counter', 0).animate({
                    Counter: countTo
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    },
                    complete: function() {
                        $(this).text($(this).Counter);
                    }
                });
            });
        }
    </script>
@endpush
