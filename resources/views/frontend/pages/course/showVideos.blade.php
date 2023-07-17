@extends('frontend.layouts.app')
@section('main')
<div class="container row mx-auto">
    <div class="col-md-12 mt-3">
        <h3 class="py-2 px-2">Welcome to Our Video course</h3>
    </div>
    <div class="col-md-12">
        <div class="p-2 ratio ratio-16x9">
            <iframe width="400" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            {{-- <video width="400" controls>
                <source src="https://www.youtube.com/watch?v=T5jeY8qmne4" type="video/mp4">
              </video> --}}
        </div>
        <div class="row p-3">
            <div class="col-md-12">
                <div class="card-body">
                    <ul class="nav nav-pills navtab-bg nav-justified" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#about" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                About
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#reviews" data-bs-toggle="tab" aria-expanded="true" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                Reviews
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#discussion" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="true" role="tab" tabindex="-1">
                               Discussion
                            </a>
                        </li>
                        <li class="nav-item" role="presentation" >
                            <a href="#courseContent" data-bs-toggle="tab" aria-expanded="false" class="nav-link active" aria-selected="true" role="tab" tabindex="-1">
                                Course Content
                             </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show" id="about" role="tabpanel">
                            This is Course Content tab
                        </div>
                        <div class="tab-pane" id="reviews" role="tabpanel">
                            <div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="card p-3 w-100 h-100">
                                            <div class="card-body">
                                                <h5>Rating</h5>
                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <h5 class="mb-0 fw-bold text-center"> <span>out of 5</span></h5>
                                                        <div class="rating d-inline-block">


                                                                    <span class="fas fa-star"></span>
                                                        </div>
                                                        <p class="text-center">Reviews</p>
                                                    </div>
                                                </div>
                            
                                                <div class="bars">
                                                        <div class="row align-items-center justify-content-start">
                                                            <div class="col-10">
                                                                <div class="progress w-100" style="background: var(--bs-gray-200);">
                                                                    <div class="progress-bar" role="progressbar"
                                                                        aria-valuenow="" aria-valuemin="0"
                                                                        aria-valuemax="100">%</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <span>3</span>
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
                                                    <div id="rating-error"></div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-inputs">
                                                        <input type="hidden" value="}" name="item_id">
                                                        <input type="hidden" value="" name="slug">
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
                                                <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                                                    <img src="{{ asset('frontend/assets/images/attached-files/img-1.jpg') }}" alt="img" width="48px"
                                                        height="48px" class=" rounded-circle shadow-4-strong d-block">
                                                    <div>
                                                        <div class="mb-2">
                                                            <h5 class="mb-0">Md Parvej</h5>
                                                            <small>2 Sec Ago</small>
                                                            <div class="rating">
                                                                    <span class="fas fa-star" style=""></span>
                                                            </div>
                                                        </div>
                                                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                                    </div>
                                                </div>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="discussion" role="tabpanel">
                            <div class="row">
                                <form action="#" method="post">
                                    <div class= "col-md-12">
                                        <textarea name="" placeholder="Input your discussion content" cols="30" rows="10" class="form-control"></textarea>
                                        <x-backend.ui.button class="btn-primary btn-sm mt-2">Submit</x-backend.ui.button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane active" id="courseContent" role="tabpanel">
                            <div class="col-md-12">
                                <div class="p-2 overflow-auto" style="height: 650px;" >
                                    @foreach (range(1, 8) as $item)
                                        <div class="mb-3">
                                            <a href="#">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="p-2">
                                                            <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" >
                                                                <label class="form-check-label" for="flexCheckDisabled">
                                                                  12. | This is more videos
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection








