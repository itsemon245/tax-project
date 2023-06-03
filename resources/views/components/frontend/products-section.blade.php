<section class="mb-5">
    <div class="card-body container-fluid px-5">
        <h2 class="header-title h4 mt-4 text-center">Tax Products</h2>
        <div class=" d-flex justify-content-center">
            <p class="text-justify" style="max-width: 100ch; font-weight:500;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam est cumque molestiae iste eum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat laborum nemo sed beatae in id veritatis placeat odit deleniti maiores!</p>
        </div>
        <div class="container d-flex justify-content-center">
            <ul class="nav nav-pills navtab-bg" role="tablist">
                @foreach ($subCategories as $item)
                    <li class="nav-item" role="presentation">
                        <a href="#{{ $item->name }}" data-bs-toggle="tab"
                            aria-expanded="{{ $item->id === 1 ? 'true' : 'false' }}"
                            aria-selected="{{ $item->id === 1 ? 'true' : 'false' }}" role="tab"
                            class="text-capitalize nav-link {{ $item->id === 1 ? 'active' : '' }}" tabindex="-1">
                            {{ $item->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                @foreach ($subCategories as $subCategory)
                    <div class="tab-pane {{ $subCategory->id === 1 ? 'active' : '' }}" id="{{ $subCategory->name }}"
                        role="tabpanel">
                        <div class="product-wrapper">
                            @php
                                $fillteredProducts = $subCategory->products->filter(function ($product) {
                                    return $product->product_category_id === 1;
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
