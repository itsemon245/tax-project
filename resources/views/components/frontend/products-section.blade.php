<section class="mb-5">
    <div class="card-body container-fluid px-5">
        <h2 class="header-title h4 my-4 text-center">Products</h2>
        <div class="container d-flex justify-content-center">
            <ul class="nav nav-pills navtab-bg" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#standard" data-bs-toggle="tab" aria-expanded="false" class="nav-link active"
                        aria-selected="false" role="tab" tabindex="-1">
                        Standard
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#special" data-bs-toggle="tab" aria-expanded="true" class="nav-link" aria-selected="false"
                        role="tab" tabindex="-1">
                        Special
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#golden" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="true"
                        role="tab">
                        Golden
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#premium" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="true"
                        role="tab">
                        Premium
                    </a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane active" id="standard" role="tabpanel">
                    <div class="product-wrapper">
                        <x-frontend.product-card />
                        <x-frontend.product-card :is-popular="true" />
                        <x-frontend.product-card />
                        <x-frontend.product-card :is-popular="true" />
                    </div>
                </div>
                <div class="tab-pane" id="special" role="tabpanel">
                    <div class="product-wrapper">
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                    </div>
                </div>
                <div class="tab-pane" id="golden" role="tabpanel">
                    <div class="product-wrapper">
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                    </div>
                </div>
                <div class="tab-pane" id="premium" role="tabpanel">
                    <div class="product-wrapper">
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                        <x-frontend.product-card />
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
