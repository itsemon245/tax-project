<section class="row px-lg-5 px-2 mt-5">
    <h3 class="text-center">Industries We Serve</h3>
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row">
                    <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. A
                        numquam inventore consectetur? Dolores sed at atque non repellat consequatur aperiam. Lorem
                        ipsum dolor, sit
                        amet consectetur adipisicing elit. Ab voluptas rerum tenetur dolores officia veritatis
                        reprehenderit
                        blanditiis earum culpa laboriosam.</p>
                @foreach (range(1, 6) as $key)
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="border bg-light w-100 px-0 px-md-3 px-lg-5 py-3 rounded">
                            <a class="text-dark">
                                <img style="width:48px;"
                                    src="{{ asset('backend/assets/images/products/product-6.png') }}" alt="" />
                                <h6>Asset Management</h6>
                                <p class="tex-justify text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit.
                                    Veniam, repellendus?</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary text-black mt-3" href="#">All Industries</a>
            </div>
        </div>
    </div>
</section>
