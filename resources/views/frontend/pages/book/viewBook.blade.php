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
                    <img style="object-fit: cover;" class="rounded w-100 h-100 border" src="{{ useImage($book->thumbnail) }}"
                        alt="" />
                </div>
                <div class="col-md-8">
                    <div class="w-100 h-100 p-3">
                        <div class="">
                            <h5 class="text-capitalize fs-3 mb-0">{{ $book->title }}</h5>
                            <span class="">by </span> <i style="font-weight: 500;">{{ $book->author }}</i>
                            <p class="mb-3 fw-bold fs-5">
                                Price:
                                <span class="text-dark" style="font-weight: 500;"> {{ $book->price }}</span>
                                <span class="mdi mdi-currency-bdt text-dark"></span>
                            </p>
                            <p class="mw-2xl mb-5">
                                {{ $book->description }}
                            </p>
                        </div>
                        <div class="d-flex gap-3">
                            <x-backend.ui.button type="custom" href=""
                                class="btn-success text-light px-3 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                <span class="mdi mdi-cart-outline"></span>
                                <span style="font-weight: 500;">Buy Now</span>
                            </x-backend.ui.button>

                            <x-backend.ui.button type="custom" href="" style="background: var(--bs-gray-400);"
                                class="text-dark py-2 px-3 d-inline-flex align-items-center justify-content-center gap-2">
                                <span class="mdi mdi-download"></span>
                                <span style="font-weight: 500;">Download Sample</span>
                            </x-backend.ui.button>
                        </div>
                    </div>
                </div>
                <div class="p-3 mt-3">
                    <h5>Description:</h5>
                    <div class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, rerum ipsum aliquid voluptates
                        architecto provident amet nemo. Temporibus dolorum qui impedit tempore vel repudiandae totam
                        tenetur. Maiores, et, tempore nam quae deleniti corrupti sit blanditiis debitis dicta autem id
                        dolorem doloremque magni amet consequuntur dolores eveniet distinctio natus quia repudiandae.
                        Temporibus corrupti doloribus, repellat, itaque totam rerum asperiores iusto enim quisquam, vero
                        quaerat! Expedita laudantium ipsam obcaecati placeat commodi libero quae eveniet labore illo
                        voluptatem soluta consequuntur, aliquid quia iusto, dolore odit ipsum eos, corrupti quos sapiente?
                        Sit consequuntur voluptatum recusandae ullam ipsa maxime ea, enim officiis earum, dignissimos sint?
                    </div>
                </div>
            </div>
            {{-- Comment Section starts --}}
            <div class="mt-5">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card p-3 w-100 h-100">
                            <div class="card-body">
                                <h5>Rating</h5>
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
                            <div class="card-body">
                                <h5 class="text-center">Write a review</h5>
                                <label class="mb-0 form-text fs-6">Give a rating</label>
                                <div class="rating mb-3">
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
                                <div class="mb-3">
                                    <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Describe your experience"></textarea>
                                    <div id="comment-error"></div>
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
                            @forelse ($reviews as $review)
                                <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                                    <img src="{{ useImage($review->avatar) }}" alt="img" width="48px"
                                        height="48px" class=" rounded-circle shadow-4-strong d-block">
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
