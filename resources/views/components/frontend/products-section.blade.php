<section class="mb-5">
    <div class="card-body container-fluid px-5">
        <h2 class="header-title h4 mt-4 text-center">{{ $products['Silver'][0]->productCategory->name}}</h2>
        <div class=" d-flex justify-content-center">
            <p class="text-justify" style="max-width: 100ch; font-weight:500;">
                {{ $products['Silver'][0]->productCategory->description }}</p>
        </div>
        <div class="container d-flex justify-content-center">
            <ul class="nav nav-pills navtab-bg" role="tablist">
                @foreach ($products as $type => $items)
                    <li class="nav-item" role="presentation">
                        <a href="#{{ $type }}" data-bs-toggle="tab" aria-expanded="{{ $type === 'Silver' ? "true" : "false"}}" aria-selected="{{ $type === 'Silver' ? "true" : "false"}}"
                            role="tab" class="text-capitalize nav-link {{ $type === 'Silver' ? "active" : ''}}" tabindex="-1">
                            {{ $type }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                @foreach ($products as $type => $items)
                    <div class="tab-pane {{ $type === 'Silver' ? "active" : ''}}" id="{{ $type }}" role="tabpanel">
                        <div class="product-wrapper">
                            @foreach ($items as $product)
                                <x-frontend.product-card :$product />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
