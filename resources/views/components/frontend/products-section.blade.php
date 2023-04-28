<section>
    <div class="card-body container">
        <h2 class="header-title h4 my-2 text-center">Products</h2>
        <ul class="nav nav-pills navtab-bg nav-justified" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="#home1" data-bs-toggle="tab" aria-expanded="false" class="nav-link active" aria-selected="false"
                    role="tab" tabindex="-1">
                    Standard
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#profile1" data-bs-toggle="tab" aria-expanded="true" class="nav-link" aria-selected="false"
                    role="tab" tabindex="-1">
                    Special
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="#messages1" data-bs-toggle="tab" aria-expanded="false" class="nav-link" aria-selected="true"
                    role="tab">
                    Golden
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home1" role="tabpanel">
                <div class="product-wrapper">
                    <x-frontend.product-card />
                    <x-frontend.product-card />
                    <x-frontend.product-card />
                </div>
            </div>
            <div class="tab-pane show" id="profile1" role="tabpanel">
                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                    imperdiet
                    a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras
                    dapibus.
                    Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                    consequat vitae, eleifend ac, enim.</p>
                <p class="mb-0">Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                    eget
                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                    ridiculus
                    mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                    enim.</p>
            </div>
            <div class="tab-pane " id="messages1" role="tabpanel">
                <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                    Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                    quam
                    felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                    rhoncus
                    ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
                    tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo
                    ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
            </div>
        </div>
    </div>
</section>
