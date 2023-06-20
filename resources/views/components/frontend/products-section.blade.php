<section class="mb-5">
    <div class="card-body container-fluid px-5">
        <h2 class="header-title h4 mt-4 text-center">{{$productCategory->name}}</h2>
        <div class=" d-flex justify-content-center">
            <p class="text-justify" style="max-width: 100ch; font-weight:500;">{{$productCategory->description}}</p>
        </div>
        <div class="container d-flex justify-content-center">
            <ul class="nav nav-pills navtab-bg" role="tablist">
                @foreach ($productCategory->productSubCategories as $item)
                    <li class="nav-item" role="presentation">
                        <a href="#{{ $item->name }}" data-bs-toggle="tab"
                            aria-expanded="{{ $item->id === 1||$item->id === 2 ? 'true' : 'false' }}"
                            aria-selected="{{ $item->id === 1||$item->id === 2 ? 'true' : 'false' }}" role="tab"
                            class="text-capitalize nav-link {{ $item->id === 1||$item->id === 2 ? 'active' : '' }}" tabindex="-1">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                @foreach ($productCategory->productSubCategories as $subCategory)
                    <div class="tab-pane {{ $subCategory->id === 1 || $subCategory->id === 2  ? 'active' : '' }}" id="{{ $subCategory->name }}"
                        role="tabpanel">
                        <div class="product-wrapper">
                            @php
                                $fillteredProducts = $subCategory->products->filter(function ($product) {
                                    if (request()->routeIs('home')) {
                                        return $product->product_category_id === 1;
                                    }else {
                                        return $product->product_category_id === 2;
                                    }
                                });
                            @endphp
                            @foreach ($fillteredProducts as $product)
                                <x-frontend.product-card :$product />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
