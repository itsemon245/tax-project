@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Review']" />
    <x-backend.ui.section-card name="All Review">
        <div class="mt-3">
            <div class="">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card p-3 w-100 h-100">
                            <div class="card-body">
                                <h5>Rating</h5>
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <div>
                                        <span class="text-dark">0</span>
                                        <span class="fas fa-star" style="color: var(--bs-gray-400);"></span>
                                        <span class="fas fa-star" style="color: var(--bs-gray-400);"></span>
                                        <span class="fas fa-star" style="color: var(--bs-gray-400);"></span>
                                        <span class="fas fa-star" style="color: var(--bs-gray-400);"></span>
                                        <div class="d-inline-flex justify-content-center align-items-center position-relative ">
                                        <span class="fas fa-star" style="color: var(--bs-gray-400);position:absolute; top:0;left:0;"></span>
                                        <span class="fas fa-star" style="z-index:2;color: var(--bs-gray-400);"></span>
                                        </div>

                                    </div>
                                        <p class="text-center">0 Reviews</p>
                                    </div>
                                </div>

                                <div class="bars">
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-10">
                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;background:var(--bs-yellow);" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="">5</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-10">
                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;background:var(--bs-yellow);" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="">4</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                                                                            <div class="row align-items-center justify-content-start">
                                            <div class="col-10">
                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;background:var(--bs-yellow);" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="">3</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                                                                            <div class="row align-items-center justify-content-start">
                                            <div class="col-10">
                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;background:var(--bs-yellow);" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="">2</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-10">
                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%;background:var(--bs-yellow);" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <span class="ps-1">1</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-3 w-100 h-100">
                            <div class="card-body">
                                <h5 class="text-center">Write a review</h5>
                                <label class="mb-0 form-text fs-6">Give a rating</label>
                                <div class="rating mb-3">
                                    <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;" data-index="1"></i>
                                    <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;" data-index="2"></i>
                                    <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;" data-index="3"></i>
                                    <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;" data-index="4"></i>
                                    <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;" data-index="5"></i>
                                    <div id="rating-error"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-inputs">
                                        <input type="hidden" value="7" name="item_id">
                                        <input type="hidden" value="book" name="slug">
                                        <input type="hidden" value="" name="rating">
                                        <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Describe your experience"></textarea>
                                        <div id="comment-error"></div>
                                    </div>
                                </div>
                                <button id="submit-button" type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <div class="card-body">
                        <h4 class="">Recent Reviews</h4>
                        <div class="review-list">
                            <div class="text-center text-muted mb-2 no-review">
                            No reviews to be found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
@endsection
@push('customJs')
<script>
    $(document).ready(function() {

        $('.input-star').click(e => {
            let yellow = 'var(--bs-yellow)'
            let gray = 'var(--bs-gray-400)'
            let icon = $(e.target)
            let value = e.target.dataset.index
            icon.prevAll().css('color', yellow)
            icon.css('color', yellow)
            icon.nextAll().css('color', gray)
            $('input[name="rating"]').val(value)
        })


        $('#submit-button').click(function(e) {
            let comment = $('[name="comment"]').val();
            let rating = $('input[name="rating"]').val();
            let itemId = $('input[name="item_id"]').val();
            let slug = $('input[name="slug"]').val();
            let url = "{{ route('review.store', 'slug') }}"
            url = url.replace('slug', slug)

            $.ajax({
                method: "post",
                url: url,
                data: {
                    'item_id': itemId,
                    "comment": comment,
                    'rating': rating,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        let data = response.data
                        let icons = '';
                        for (let i = 1; i < 6; i++) {
                            let color = i > data.rating ? 'var(--bs-gray-200)' :
                                'var(--bs-yellow)'
                            icons +=
                                `\n<span class="fas fa-star" style="color:${color};"></span>`
                        }

                        let review = ` 
                            <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                                <img src="${data.avatar}" alt="img"
                                    width="64px" height="64px" class=" rounded-circle shadow-4-strong d-block">
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">${data.name}</h5>
                                        <small>${data.createdAt}</small>
                                        <div class="rating">
                                            ${icons}
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0">${data.comment}
                                    </p>
                                </div>
                            </div>
                        `

                        $('.no-review').remove()
                        $('.review-list').prepend(review)

                        Toast.fire({
                            icon: "success",
                            title: response.message
                        })
                        console.log(response);
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: response.message
                        })
                    }
                },
                error: function(err) {
                    let errors = err.responseJSON.errors
                    if (errors.rating) {
                        $('#rating-error').html(
                            `<span class="text-danger">${errors.rating}</span>`)
                    }
                    if (errors.comment) {
                        $('#comment-error').html(
                            `<span class="text-danger">${errors.comment}</span>`)
                    }
                }
            });
        })
    });
</script>
@endpush



