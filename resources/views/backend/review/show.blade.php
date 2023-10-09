@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Review', 'View']" />
    <x-backend.ui.section-card name="View Review">
        <div class="review">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="review">

                            <div class="row">
                                <div class="col-lg-4">
                                    <span>Avatar:</span>
                                </div>
                                <div class="col-lg-8">
                                    <span><img src="{{ $review->avatar }}" alt="" width="200"></span>
                                </div>
                                <div class="col-lg-4">
                                    <span>Author Name:</span>
                                </div>
                                <div class="col-lg-8">
                                    <span>{{ $review->user->name }}</span>
                                </div>
                                
                                <div class="col-lg-4">
                                    <span>Name:</span>
                                </div>
                                
                                <div class="col-lg-8">
                                    <span>{{ $review->name }}</span>
                                </div>
                                
                                <div class="col-lg-4">
                                    <span>Comment:</span>
                                </div>
                                
                                <div class="col-lg-8">
                                    <span> {{ $review->comment }}</span>
                                </div>
                                
                                <div class="col-lg-4">
                                    <span>Rating:</span>
                                </div>
                                
                                <div class="col-lg-8">
                                    <span>{{ $review->rating }}</span>
                                </div>
                                
                                <div class="col-lg-4">
                                    <span>Date:</span>
                                </div>
                                <div class="col-lg-8">
                                    <span>{{ $review->created_at->format('d F Y H:i A') }}</span>
                                </div>
                                
                                <div class="col-lg-4">
                                    <span>Status</span>
                                </div>
                                <div class="col-lg-8">
                                    @if ($review->status === 1)
                                        <span class="badge bg-success rounded-pill">Active</span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">in-active</span>
                                    @endif
                                </div>
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
            let action = "{{ route('review.store', 'SLUG') }}";
            $('#reviewable_type').on('change', function() {
                var selectedValue = $(this).val();
                action = action.replace('SLUG', selectedValue);
                let url = "{{ route('ajax.get.items', 'SLUG') }}";
                url = url.replace('SLUG', selectedValue);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        $('#reviewable_item').children().remove()
                        response.forEach(element => {
                            let option =
                                `<option value="${element.id}"> ${element.title ?? element.name} </option>`
                            $('#reviewable_item').append(option)
                        });

                    },
                });
            });
            $('#submit-button').click(function(e) {
                let comment = $('[name="comment"]').val();
                let name = $('[name="name"]').val();
                let rating = $('input[name="rating"]').val();
                let itemId = $('input[name="item_id"]').val();

                $.ajax({
                    method: "post",
                    url: action,
                    data: {
                        'item_id': itemId,
                        "comment": comment,
                        'rating': rating,
                        'name': name,
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
                                <img loading="lazy" src="${data.avatar}" alt="img"
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
            $('.input-star').click(e => {
                let yellow = 'var(--ct-yellow)'
                let gray = 'var(--ct-gray-400)'
                let icon = $(e.target)
                let value = e.target.dataset.index
                icon.prevAll().css('color', yellow)
                icon.css('color', yellow)
                icon.nextAll().css('color', gray)
                $('input[name="rating"]').val(value)
            })
        });
    </script>
@endpush
