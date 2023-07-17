@php
    $productFeats = json_decode($product->package_features);
@endphp
<div class="product-card" style="min-height: 420px;">
    @if ($product->is_most_popular)
        <div class="product-type bg-blue p-2 text-light text-center h5 mb-0" style="font-weight: 600">Most Popular</div>
    @endif
    <div class="product-content px-4 py-2">
        <h2 class="text-uppercase mb-0" style="font-weight: 500;">
            {{ $product->title }}
        </h2>
        <h5 class="" style="font-weight: 300;">
            <span class="badge bg-danger" style="font-weight: 400;">
                {{ explode(' ', $product->sub_title)[0] }}
            </span> {{ join(' ', array_slice(explode(' ', $product->sub_title), 1)) }}
        </h5>
        <h3 class="product-price mb-0">
            Tk. {{ Str::lower($product->title) !== 'free' ? $product->price : '0.' }}
        </h3>
        <h5 class="product-discount mb-0" style="font-weight: 300;">Early Bird Savings
            <span class="badge bg-success"
                style="font-weight: 400;">{{ $product->discount }}{{ $product->is_discount_fixed ? 'Tk' : '%' }}
                Off</span>
        </h5>

        <div class="d-flex justify-content-center my-2">
            <div class="cta d-flex flex-column align-items-center">
                <a href="{{ route('product.choose', $product->id) }}" class="btn btn-success text-light w-100"
                    style="font-weight: 600">Start
                    Now</a>
                <div class="rating mt-2">
                    <a href="{{ route('review.item', ['product', $product->id]) }}" class="mb-1">
                        <x-avg-review-stars :avg="$product->reviews_avg_rating" />
                    </a>
                    <p class="text-center mb-0">
                        <a href="{{ route('review.item', ['product', $product->id]) }}" class="text-muted">(
                            {{ $product->reviews_count }} Reviews )</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="product-details">
            <h6 class="" style="text-decoration: underline;">Package Includes:</h6>
            <ul class="custom-bullet p-0 mb-2">
                @foreach ($productFeats as $item)
                    <li style="color: {{ $item->color }}"
                        class="d-flex justify-content-center gap-2 align-items-center">
                        <span class="mdi mdi-check text-success"></span>
                        <p>
                            {{ $item->package_feature }}
                        </p>
                    </li>
                @endforeach
            </ul>
            <a href="#" class="d-flex justify-content-center a"
                style="text-decoration:none;font-weight: 500;">More
                Details</a>
        </div>
    </div>
</div>
