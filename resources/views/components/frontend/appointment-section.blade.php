<section class="" style="background: var(--bs-gray-100);">
    <div id="appointmentSection" class="carousel slide pointer-event" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#appointmentSection" data-bs-slide-to="0" class="active" aria-current="true"></li>
            <li data-bs-target="#appointmentSection" data-bs-slide-to="1" class="" aria-current="true"></li>
            <li data-bs-target="#appointmentSection" data-bs-slide-to="2" class="" aria-current="true"></li>
        </ol>
        <div class="carousel-inner p-5" role="listbox">
            <div class="carousel-item active mx-3">
                <div class="row align-items-cetner justify-content-center">
                    <div class="col-md-5">
                        <div class="row justify-content-center">
                            <img style="max-width:350px;"
                                src="{{ asset('frontend/assets/images/products/product-1.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-5 align-self-center justify-self-center">
                        <div>
                            <h2 class="mb-0" style="font-size:30px;font-weight:600;">Expert Assist</h2>
                            <p class="mb-1" style="font-size:20px;font-weight:400;">File with free expert</p>
                            <span class="mb-0 px-3 py-1 bg-success rounded text-light"
                                style="font-size:18px;font-weight:400;">Free For Everyone</span>
                        </div>
                        <div class="my-4" style="max-width:500px;text-align:justify;">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perferendis sequi nostrum ex quos
                            voluptas repudiandae deleniti, iusto doloremque recusandae veniam. Iure id, repellat illum
                            labore ex beatae voluptatem et reprehenderit consequuntur modi accusantium neque repellendus
                            laudantium. Delectus, eum doloribus! Hic cum sapiente repud
                        </div>
                        <div class="d-flex gap-5 align-items-center flex-wrap">
                            <a class="btn btn-primary text-capitalize"
                                href="#">Make
                                appointment</a>
                            <div>
                                <a class="text-capitalize a d-flex align-items-center gap-2" href="#">
                                    <span class="mdi mdi-map-marker-outline  text-primary"></span>
                                    Our Office
                                </a>
                            </div>
                            <div>
                                <a class="text-capitalize a d-flex align-items-center gap-2" href="#">
                                    <img src="{{ asset('frontend/assets/icons/tax-expert-icon.svg') }}" alt="">
                                    Tax Expert
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#appointmentSection" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#appointmentSection" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</section>
