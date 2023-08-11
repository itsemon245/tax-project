@extends('frontend.layouts.app')
@section('main')
    <div class="row mt-5 mb-3 px-2 px-md-5 mx-md-5">
        <div class="col-md-3">
            <div class="expert-filter p-3" style="background: #F1EBEB; border-radius: 10px">
                <div class="filters">
                    <div class="filter-group my-2">
                        <div class="label mb-2">
                            <span>Categories</span>
                        </div>
                        <div class="items">
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="7">
                                <span class="ms-3">Business</span>
                            </label>
                            <br>
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="8">
                                <span class="ms-3">Individual</span>
                            </label>
                            <br>
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="9">
                                <span class="ms-3">Company</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter-group my-2" data-group-type="status">
                        <div class="label mb-2">
                            <span>Types</span>
                        </div>
                        <div class="items">
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="7">
                                <span class="ms-3">Business</span>
                            </label>
                            <br>
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="8">
                                <span class="ms-3">Individual</span>
                            </label>
                            <br>
                            <label class="filter form-check-label">
                                <input type="checkbox" class="form-check-input" name="status" value="9">
                                <span class="ms-3">Company</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <section class="container">
                <div class="row">
                    @foreach ($caseStudies as $caseStudy)
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="h-100">
                                <div class="d-flex flex-column justify-content-between border border-2 rounded"
                                    style="overflow:hidden;">
                                    <div class="px flex-grow-1">
                                        <img src="{{ useImage($caseStudy->image) }}" class="mb-2" style="max-width:100%;"
                                            alt="">
                                        <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                            <b>{{ $caseStudy->name }}</b>
                                        </h4>
                                        <p class="text-center text-dark p-2 " style="font-size: 13px;">
                                            {{ $caseStudy->intro }}</p>
                                    </div>
                                    <div class="border-bottom border-dark mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <span class="like-btn mdi mdi-thumb-up-outline " role="button"></span>
                                            <span>21</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-1 text-white">
                                            <span>14</span>
                                            <span class="mdi mdi-download" role="button"></span>
                                        </div>
                                    </div>
                                    <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                        style='background: var(--bg-dark);'>
                                        <x-avg-review-stars :avg="0" class="text-white" />
                                        <p class="text-end text-light m-0" style="font-size: 13px;">
                                            @if ($caseStudy->price !== 'Free')
                                                <span class="fw-medium font-16">{{ $caseStudy->price }} </span> <span
                                                    class="mdi mdi-currency-bdt font-20"></span>
                                            @else
                                                <span class="fw-medium font-16 text-success">{{ $caseStudy->price }} </span>
                                            @endif

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
@push('customJs')
    <script>
        $(document).ready(function() {
            $('.like-btn').each((i, btn) => {
                $(btn).click(function(e) {
                    let count = parseInt($(this).next().text())
                    $(this)
                        .toggleClass('mdi-thumb-up-outline')
                        .toggleClass('mdi-thumb-up text-primary')

                    if ($(this).hasClass('mdi-thumb-up text-primary')) {
                        $(this).next().text(count + 1)
                    } else {
                        $(this).next().text(count - 1)
                    }
                })
            })

        });
    </script>
@endpush
