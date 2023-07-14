@extends('frontend.layouts.app')
@section('main')
<div class="container row">
    <div class="col-md-3">
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
            <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-5 fw-semibold">Show All Categoryies</span>
              </a>
              <div class="list-group list-group-flush border-bottom scrollarea">
                <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item(5)</strong>
                    <small>Wed</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a</div>
                </a>
                @foreach (range(1, 5) as $item)
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                      <strong class="mb-1">List group item(10)</strong>
                      <small class="text-muted">Tues</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a</div>
                  </a>
                @endforeach
              </div>
        </div>
    </div>
    <div class="col-md-9">
        <section class="py-12 py-sm-24 py-md-32 my-5">
            <div class="container">
                <div class="mx-auto">
                    <div class="row">
                        @foreach (range(1, 6) as $item)
                        <div class="col-md-4">
                            <a href="#">
                                <div>
                                    <div
                                        class="d-grid grid-cols-1 mw-md mx-auto pb-10 px-10 bg-primary border border-3 border-gray-800 rounded overflow-hidden">
                                        <img src="https://picsum.photos/seed/random/300" alt=""
                                            style="object-fit: cover; width: 100%" />
    
                                        <div class="mt-auto px-3 pt-3 pb-1 w-100 bg-white">
                                            <h4 class="fs-5 mb-1 text-center text-dark text-uppercase">
                                                <b>Leslie Alexander</b>&nbsp
                                                <span class="text-danger" style="font-size: 13px">40% off</span>
                                            </h4>
                                            <p class="text-center text-dark mt-3"
                                                style="font-size: 13px;
                                        line-height: 16px;">
                                                Lorem ipsum dolor sit
                                                amet
                                                consectetur, adipisicing
                                                elit. Molestiae provident
                                                inventore aliquam perspiciatis amet! Vel delectus ad suscipit veniam natus!</p>
                                        </div>
                                        <div class="mt-auto px-2 d-flex justify-content-between align-content-center py-2 w-100"
                                            style='
                                        background: rgba(14, 14, 14, 0.758);  /* fallback for old browsers */
                                        background: -webkit-linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758);  /* Chrome 10-25, Safari 5.1-6 */
                                        background: linear-gradient(to bottom, #64646478, rgba(14, 14, 14, 0.758) /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                                        '>
                                            <p class="text-muted float-start m-0">
                                                <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                                <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                                <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                                <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                                <span class="mdi mdi-star text-warning" style="font-size: 16px"></span>
                                            </p>
                                            <p class="text-end text-light m-0" style="font-size: 13px;">
                                                TK.150/-</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>







@endsection
