@php
    $isPopular = $attributes->get('is-popular');
@endphp
<div class="product-card" style="{{ $isPopular ? '' : 'scale:0.9;' }};">
    @if ($isPopular)
        <div class="product-type bg-blue p-2 text-light text-center h5 mb-0" style="font-weight: 600">Most Popular</div>
    @endif
    <div class="product-content px-4 py-2">
        <h2 class="text-uppercase mb-0" style="font-weight: 500;">
            Free
        </h2>
        <h5 class="" style="font-weight: 300;">
            <span class="badge bg-danger" style="font-weight: 400;">Free</span> expert assist
            included
        </h5>
        <h3 class="product-price mb-0">Tk. 1000.</h3>
        <h5 class="product-discount mb-0" style="font-weight: 300;">Early Bird Savings
            <span class="badge bg-success" style="font-weight: 400;">44% Off</span>
        </h5>

        <div class="d-flex justify-content-center my-2">
            <div class="cta d-flex flex-column align-items-center">
                <button class="btn btn-success text-light w-100" style="font-weight: 600">Start
                    Now</button>
                <div class="rating">
                    <p class="text-muted float-start me-1 mb-0">
                        <span class="mdi mdi-star text-warning"></span>
                        <span class="mdi mdi-star text-warning"></span>
                        <span class="mdi mdi-star text-warning"></span>
                        <span class="mdi mdi-star text-warning"></span>
                        <span class="mdi mdi-star"></span>
                    </p>
                    <p class="text-center mb-0">
                        <a href="" class="text-muted">( 36 Reviews )</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="product-details">
            <h6 class="" style="text-decoration: underline;">Package Includes:</h6>
            <ul class="custom-bullet p-0 mb-2">
                <li class="text-dark d-flex justify-content-center gap-2">
                    <span class="mdi mdi-check text-success"></span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                    </p>
                </li>
                <li class="text-success d-flex justify-content-center gap-2">
                    <span class="mdi mdi-check text-success"></span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                    </p>
                </li>
                <li class="text-danger d-flex justify-content-center gap-2">
                    <span class="mdi mdi-check text-success"></span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                    </p>
                </li>
                <li class="text-dark d-flex justify-content-center gap-2">
                    <span class="mdi mdi-check text-success"></span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing
                    </p>
                </li>
            </ul>
            <a href="#" class="d-flex justify-content-center" style="text-decoration:none;font-weight: 500;">More
                Details</a>
        </div>
    </div>
</div>
