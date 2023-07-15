@extends('frontend.layouts.app')
@section('main')
<div class="container row">
    <div class="row">
        <div class="col-md-3 mt-5">
            <div class="expert-filter p-3" style="background: #F1EBEB; border-radius: 10px">
                <div class="filters">
                    <div class="filter-group my-2" >
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
            <section class="py-12 py-sm-24 py-md-32 my-5">
                <div class="container">
                    <div class="mx-auto">
                        <div class="row">
                            @foreach (range(1, 3) as $item)
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
</div>







@endsection
