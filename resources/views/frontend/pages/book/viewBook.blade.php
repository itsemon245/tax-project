@extends('frontend.layouts.app')
@section('main')
    @push('customCSS')
        <style>
            .yellow {
                color: yellow;
            }
        </style>
    @endpush
    <section class="py-md-5 my-5 ">
        <div class="container px-2">
            <div class="row mb-24">
                <div class="col-md-4 mb-3 mb-md-0">
                    <img style="object-fit: cover;" class="rounded w-100 h-100" src="{{ useImage($book->thumbnail) }}"
                        alt="" />
                </div>
                <div class="col-md-8">
                    <div class="w-100 h-100">
                        <div class="mb-10 pb-10">
                            <h1 class="mt-2 mb-6 mw-xl text-capitalize">{{ $book->title }}</h1>
                            <span class="badge bg-success mb-3">Author: {{ $book->author }}</span>

                            <p class="mb-8 h3 text-primary">
                                <span>{{ $book->price }} Tk.</span>
                                {{-- <span class="fw-normal  text-decoration-line-through" style="font-size: 16px;">{{$book->}}</span> --}}
                            </p>

                            <p class="mw-2xl">
                                {{ $book->description }}
                            </p>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6 mb-2">
                                <x-backend.ui.button type="custom" href=""
                                    class="btn-success text-light py-md-2 d-flex align-items-center justify-content-center gap-4">
                                    <span class="mdi mdi-download"></span>
                                    <span>Download Sample</span>
                                </x-backend.ui.button>

                            </div>
                            <div class="col-md-6">
                                <x-backend.ui.button type="custom" href=""
                                    class="btn-primary text-light py-md-2 d-flex align-items-center justify-content-center gap-4">
                                    <span class="mdi mdi-cart-outline"></span>
                                    <span>Add to cart</span>
                                </x-backend.ui.button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Comment Section starts --}}
            <div class="mt-5">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card p-3 w-100 h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <h5 class="mb-0 fw-bold text-center">4.5 <span>out of 5</span></h5>
                                        <div class="rating d-inline-block">
                                            <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            <span class="fas fa-star" style="color: var(--bs-gray-400);"></span>
                                        </div>
                                        <p class="text-center">296 Reviews</p>
                                    </div>
                                </div>

                                <div class="bars">
                                    @foreach (range(5, 1) as $key)
                                        @php
                                            $progress = $key == 5 ? 100 : 0;
                                        @endphp
                                        <div class="d-flex gap-3 align-items-center justify-content-start">
                                            <div class="progress flex-grow-1 mb-0">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $progress }}%;background:var(--bs-yellow);"
                                                    aria-valuenow="{{ $progress }}" aria-valuemin="0"
                                                    aria-valuemax="100">{{ $progress }}%</div>
                                            </div>
                                            <div class="">
                                                <span>{{ $key }}</span>
                                                <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-3 w-100 h-100">
                            <h5 class="">Write a review</h5>
                            <div class="card-body">
                                <label class="mb-0 form-text fs-6">Give a rating</label>
                                <div class="rating mb-2">
                                    <i class="fas fa-star input-star fs-5"
                                        style="color: var(--bs-gray-400);cursor: pointer;" data-index="1"></i>
                                    <i class="fas fa-star input-star fs-5"
                                        style="color: var(--bs-gray-400);cursor: pointer;" data-index="2"></i>
                                    <i class="fas fa-star input-star fs-5"
                                        style="color: var(--bs-gray-400);cursor: pointer;" data-index="3"></i>
                                    <i class="fas fa-star input-star fs-5"
                                        style="color: var(--bs-gray-400);cursor: pointer;" data-index="4"></i>
                                    <i class="fas fa-star input-star fs-5"
                                        style="color: var(--bs-gray-400);cursor: pointer;" data-index="5"></i>
                                    <input type="hidden" value="" name="rating">
                                    <input type="hidden" value="{{ $book->id }}" name="item_id">
                                    <div id="rating-error"></div>
                                </div>
                                <div class="mb-2">
                                    <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Describe your experience"></textarea>
                                    <div id="comment-error"></div>
                                </div>
                                <button id="submit-button" type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <h4 class="">Recent Reviews</h4>
                    <div class="card-body review-list">
                        @forelse ($reviews as $review)
                            <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                                <img src="{{ useImage($review->avatar) }}" alt="img" width="48px" height="48px"
                                    class=" rounded-circle shadow-4-strong d-block">
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">{{ $review->name }}</h5>
                                        <small>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                                        <div class="rating">
                                            @foreach (range(1, 5) as $rating)
                                                @php
                                                    $color = $rating > $review->rating ? 'var(--bs-gray-200)' : 'var(--bs-yellow)';
                                                @endphp
                                                <span class="fas fa-star" style="color: {{ $color }};"></span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0">{{ $review->comment }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-muted mb-2 no-review">
                                No reviews to be found
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- card for writing review --}}

        </div>
    </section>

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

                    $.ajax({
                        method: "post",
                        url: "{{ route('review.store', 'book') }}",
                        data: {
                            'item_id': itemId,
                            "comment": comment,
                            'rating': rating,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
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
@endsection
