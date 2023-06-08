@extends('frontend.layouts.app')
@section('main')
    <section class="py-3 px-3" style="background: var(--bs-gray-100);">
        <div class="container shadow p-3 rounded-3 bg-white mt-5">
            <div class="row align-items-start">
                <div class="col-md-3 mb-3 mb-md-0">
                    <img class="rounded-3 w-100" src="{{ asset('backend/assets/images/users/user-3.jpg') }}" alt="Expert"
                        style="aspect-ratio:1/1; object-fit:contain;">
                </div>
                <div class="col-md-6">
                    <h2><b>Dr. Ekramul Haque</b></h2>
                    <p class="m-0 text-muted">MBBS</p>
                    <p class="m-0 text-muted">Psychiatry Darmotology</p>
                    <p class="mt-3">
                        <small class="text-muted">Working at </small>
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing
                        elit. Ab saepe ratione alias illum soluta harum consectetur natus expedita, commodi a sed.
                        Nesciunt repellat ut neque non cumque, harum libero cupiditate?
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="d-flex justify-content-center align-items-center flex-column h-100">
                        <h4><b>Consultation Fee</b></h4>
                        <p class="m-0"><span class="text-primary">$470 </span>(Including VAT)</p>
                        <p class="m-0 text-muted">Before <s>$650</s></p>
                        <a class="btn btn-primary text-capitalize mt-2" href="#">See Doctor Now</a>
                    </div>
                </div>
            </div>
            <div class="expert-details clearfix mt-4">
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Total Experience</h5>
                    <h4>15 Years</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">BMDC Number</h5>
                    <h4>8652</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Join Doctime</h5>
                    <h4>31 july 2021</h4>
                </div>
                <div class="p-3 ps-0 me-3" style="float: left">
                    <h5 class="text-muted mb-3">Total Ratings(888)</h5>
                    <div class="rating">
                        <h4>
                            <span class="mdi mdi-star text-warning"></span>
                            4.9
                        </h4>
                    </div>
                </div>
            </div>
            <hr class="text-dark">
            <div class="infos">
                <a href="#" class="me-3">Info</a>
                <a href="#" class="me-3">Experience</a>
                <a href="#" class="me-3">Reviews</a>
            </div>
        </div>

        <div class="container my-3">
            <div class="row">
                <div class="col-lg-6 p-0 mb-3 mb-lg-0">
                    <div class="shadow p-3 rounded-3 bg-white">
                        <h4><b>Dr. Ekramul Haque - MBBS</b></h4>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quisquam
                            illum odit totam velit sit, aliquam beatae ab porro architecto, hic recusandae sed. Delectus
                            quas sit, eveniet ratione possimus beatae praesentium odit reiciendis quia aperiam placeat vero
                            doloribus maxime, magni, commodi necessitatibus dolore. Quaerat, beatae vitae eum non
                            voluptatibus consequatur saepe ut, iure enim provident porro molestiae maxime perspiciatis
                            debitis, nobis tenetur exercitationem obcaecati iusto autem illum. Adipisci at enim assumenda
                            officiis provident aliquam iste delectus dolores, vitae quidem, nobis fugiat vel. Dolores
                            excepturi laboriosam eum expedita ut labore accusantium quaerat quibusdam in sit autem eius,
                            assumenda, aspernatur, ipsum quas!</p>
                    </div>
                </div>
                <div class="col-lg-6 p-0 ps-lg-3">
                    <div class="shadow p-3 rounded-3 bg-white mb-3">
                        <h4><b>Availability</b></h4>
                        <div class="border-start border-3 ps-2">
                            <p class="text-muted m-0">Instant Consultation time</p>
                            <p><b>Sat-Fri(08:00AM-11:55PM)</b></p>
                        </div>
                    </div>
                    <div class="shadow p-3 rounded-3 bg-white">
                        <h4><b>At a Glance</b></h4>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <div class="border-start border-3 ps-2">
                                    <p class="text-muted m-0">Instant Consultation time</p>
                                    <p><b>Sat-Fri(08:00AM-11:55PM)</b></p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="border-start border-3 ps-2">
                                    <p class="text-muted m-0">Instant Consultation time</p>
                                    <p><b>Sat-Fri(08:00AM-11:55PM)</b></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border-start border-3 ps-2">
                                    <p class="text-muted m-0">Instant Consultation time</p>
                                    <p><b>Sat-Fri(08:00AM-11:55PM)</b></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border-start border-3 ps-2">
                                    <p class="text-muted m-0">Instant Consultation time</p>
                                    <p><b>Sat-Fri(08:00AM-11:55PM)</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customJs')
    <script></script>
@endpush
