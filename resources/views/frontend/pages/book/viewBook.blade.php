@extends('frontend.layouts.app')
@section('main')
    <section class="py-md-5 my-5 ">
        <div class="container px-2">
            <div class="row mb-24">
                <div class="col-12 col-lg-6 mb-3 mb-md-0">
                    <div class="d-flex justify-content-center">
                        <img style="object-fit: cover; max-width:340px;height:450px;"class="rounded shadow"
                            src="https://picsum.photos/seed/random/1080" alt="" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="ps-lg-20">
                        <div class="mb-10 pb-10">
                            <h1 class="mt-2 mb-6 mw-xl text-capitalize">BRILE water filter carafe</h1>
                            <span class="badge bg-success mb-3">Author: Billi</span>

                            <p class="mb-8 h3 text-primary">
                                <span>$29.99</span>
                                <span class="fw-normal  text-decoration-line-through" style="font-size: 16px;">$33.69</span>
                            </p>

                            <p class="mw-2xl">
                                Maecenas commodo libero ut molestie dictum. Morbi placerat eros
                                id porttitor sagittis.
                                I had interdum at ante porta, eleifend feugiat nunc. In semper euismod mi
                                a accums lorem sad. Morbi at auctor nibh. Aliquam tincidunt placerat mollis. Lorem euismod
                                dignissim,
                                felis tortor ollis eros, non ultricies turpis.</p>
                        </div>
                        <div class="row my-5">
                            <div class="col-md-6 mb-2">
                                <x-backend.ui.button type="custom" href=""
                                    class="btn-success text-light py-md-2 d-flex align-items-center justify-content-center gap-4">
                                    <span class="mdi mdi-download"></span>
                                    <span>Download Sample</span>
                                </x-backend.ui.button>

                            </div>
                            <div class="col-md-6">
                                <x-backend.ui.button type="custom" href=""
                                    class="btn-primary text-light py-md-2 d-flex align-items-center justify-content-center gap-4">
                                    <span class="mdi mdi-cart-outline"></span>
                                    <span>Add to cart</span>
                                </x-backend.ui.button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
