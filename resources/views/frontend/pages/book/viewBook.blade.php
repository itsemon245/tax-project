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
                <div class="col-12 col-lg-6 mb-3 mb-md-0">
                    <div class="d-flex justify-content-center">
                        <img style="object-fit: cover; max-width:340px;height:450px;"class="rounded shadow"
                            src="https://picsum.photos/seed/random/1080" alt="" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="ps-lg-20">
                        <div class="mb-10 pb-10">
                            <h1 class="mt-2 mb-6 mw-xl text-capitalize">BRILE water filter carafe</h1>
                            <span class="badge bg-success mb-3">Author: Billi</span>

                            <p class="mb-8 h3 text-primary">
                                <span>$29.99</span>
                                <span class="fw-normal  text-decoration-line-through" style="font-size: 16px;">$33.69</span>
                            </p>

                            <p class="mw-2xl">
                                Maecenas commodo libero ut molestie dictum. Morbi placerat eros
                                id porttitor sagittis.
                                I had interdum at ante porta, eleifend feugiat nunc. In semper euismod mi
                                a accums lorem sad. Morbi at auctor nibh. Aliquam tincidunt placerat mollis. Lorem euismod
                                dignissim,
                                felis tortor ollis eros, non ultricies turpis.</p>
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
                {{-- Comment Section starts --}}
                <div class="container mt-3">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 card-body">
                                <div class="container mt-5">
                                    <div class=" mt-5 container text-center">
                                        <h3 class="mt-5">4.5<span>/5</span></h3>
                                        <div>
                                            <div class="rating d-inline-block">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star filled"></i>
                                            </div>
                                        </div>
                                        <p>296 Ratings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 container">
                                <div class="card-body container">
                                    <div class="rating-star">
                                        <h5>5 Stars</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width:65%"></div>
                                        </div>
                                        <h6>65%</h6>
                                    </div>
                                    <div class="rating-star">
                                        <h5>4 Stars</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width:26%"></div>
                                        </div>
                                        <h6>26%</h6>
                                    </div>
                                    <div class="rating-star">
                                        <h5>3 Stars</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width:5%"></div>
                                        </div>
                                        <h6>5%</h6>
                                    </div>
                                    <div class="rating-star">
                                        <h5>2 Stars</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width:2%"></div>
                                        </div>
                                        <h6>2%</h6>
                                    </div>
                                    <div class="rating-star mb-0">
                                        <h5>1 Stars</h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style="width:1%"></div>
                                        </div>
                                        <h6>1%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card container">
                        <h3 class="container mt-3">Recent Reviews</h3>
                        <div class="container card-body">
                            <div class="container d-flex">
                                <div class="review-img">
                                    <a href="profile.html"><img src="{{ asset('frontend/assets/images/bg-auth.jpg') }}"
                                            alt="img" width="60px" height="60px"
                                            class=" rounded-circle shadow-4-strong d-block"></a>
                                </div>
                                <div class="review-name-group">
                                    <h5><a href="profile.html">Teri Jennings</a> <span> | 11 months age | </span>
                                        <span class="text-muted">
                                            <div class="rating d-inline-block">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star filled"></i>
                                            </div>
                                        </span>
                                    </h5>
                                    <p class="container text-muted">I have been in treatment all my life For extrinsic
                                        asthma. As spring pollen are big triggers, I really depend on antihistamines and
                                        Allegra Generic, from Curist, is as effective as Brand Allegra. And a very be
                                        healthy difference in price.</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-body container">
                                <div class="container d-flex">
                                    <div class="review-img">
                                        <a href="profile.html"><img src="{{ asset('frontend/assets/images/bg-auth.jpg') }}"
                                                alt="img" width="60px" height="60px"
                                                class=" rounded-circle shadow-4-strong d-block"></a>
                                    </div>
                                    <div class="review-name-group">
                                        <h5><a href="profile.html">Teri Jennings</a> <span> | 11 months age | </span>
                                            <span class="text-muted">
                                                <div class="rating d-inline-block">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star filled"></i>
                                                </div>
                                            </span>
                                        </h5>
                                        <p class="container text-muted">I have been in treatment all my life For extrinsic
                                            asthma. As spring pollen are big triggers, I really depend on antihistamines and
                                            Allegra Generic, from Curist, is as effective as Brand Allegra. And a very be
                                            healthy difference in price.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="card-body container">
                                <div class="container d-flex">
                                    <div class="review-img">
                                        <a href="profile.html"><img
                                                src="{{ asset('frontend/assets/images/bg-auth.jpg') }}" alt="img"
                                                width="60px" height="60px"
                                                class=" rounded-circle shadow-4-strong d-block"></a>
                                    </div>
                                    <div class="review-name-group">
                                        <h5><a href="profile.html">Teri Jennings</a> <span> | 11 months age | </span>
                                            <span class="text-muted">
                                                <div class="rating d-inline-block">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star filled"></i>
                                                </div>
                                            </span>
                                        </h5>
                                        <p class="container text-muted">I have been in treatment all my life For extrinsic
                                            asthma. As spring pollen are big triggers, I really depend on antihistamines and
                                            Allegra Generic, from Curist, is as effective as Brand Allegra. And a very be
                                            healthy difference in price.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="container card-body">
                            <h3 class="mt-2">Input Your Review</h3>
                            <div class="review-coment-group">
                                <form action="javascript:;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="rating ">
                                                    <i class="far fa-star" id="star1" data-id={{ 1 }}></i>
                                                    <i class="far fa-star" id="star2" data-id={{ 2 }}></i>
                                                    <i class="far fa-star" id="star3" data-id={{ 3 }}></i>
                                                    <i class="far fa-star" id="star4" data-id={{ 4 }}></i>
                                                    <i class="far fa-star" id="star5" data-id={{ 5 }}></i>
                                                    <input type="hidden" class="form-control raitng" value="1"
                                                        name="raitings">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="7" id="comment" name="text"></textarea>
                                            </div>
                                        </div>
                                        <div class="review-submit mt-3">
                                            <button type="submit" class="btn btn-primary buttonSubmit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('customJs')
        <script>
            $("#star1").click(function() {
                $("#star1").css("color", "black").removeClass("bigstar");
                $("#star1").css("color", "#FFC700");
                $(this).addClass("bigstar");
            });
            $("#star2").click(function() {
                $("#star2").css("color", "black").removeClass("bigstar");
                $("#star1,#star2").css("color", "#FFC700");
                $(this).addClass("bigstar");
            });
            $("#star3").click(function() {
                $("#star3").css("color", "black").removeClass("bigstar");
                $("#star1,#star2,#star3").css("color", "#FFC700");
                $(this).addClass("bigstar");
            });
            $("#star4").click(function() {
                $("#star4").css("color", "black").removeClass("bigstar");
                $("#star1,#star2,#star3,#star4").css("color", "#FFC700");
                $(this).addClass("bigstar");
            });
            $("#star5").click(function() {
                $("#star5").css("color", "black").removeClass("bigstar");
                $("#star1,#star2,#star3,#star4,#star5").css("color", "#FFC700");
                $(this).addClass("bigstar");
            });
        </script>

        <script>
            $('.fa-star').on('click', function() {
                var id = $(this).data('id');
                $('.raitng').val(id)
            })
        </script>

        <script>
           

            var buttonSubmit = $('.buttonSubmit');
            buttonSubmit.on('click', function(e) {
                e.preventDefault();
                var comment = $('#comment').val();
                var rating = $('.raitng').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "post",
                    url: "{{ route('review.store', 'book') }}",
                    data: {
                        'item_id': '{{ $book->id }}',
                        "comment": comment,
                        'rating': rating,
                    },
                    success: function(response) {
                        if (response.success) {
                            Toast.fire({
                                icon: "success",
                                title: response.message
                            })
                            console.log(response);
                        }else{
                            Toast.fire({
                                icon: "error",
                                title: response.message
                            })
                        }
                    },
                });
            })
        </script>
    @endpush
@endsection
