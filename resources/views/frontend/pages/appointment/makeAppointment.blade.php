@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />

    <div class="app_main">
        <div id="app_form_section" class="bg-white pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center pt-5 pb-4">Make Appointment</h2>
                        {{-- <div class="app_form rounded row  pb-5">
                            <h4 class="text-center pt-4">
                                Fill out Your Information
                            </h4>
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Name" type="text" placeholder="Name" name="name" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Email" type="text"  placeholder="Email" name="email" />
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                <x-backend.form.text-input label="Phone" type="number"  placeholder="Phone" name="phone" />
                            </div>

                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                    <x-backend.form.select-input label="Appointment Type" name="type" placeholder="Appointment Type">
                                        <option value="physical" @if ($isPhysical)
                                            selected
                                        @endif>Physical</option>
                                        <option value="virtual" @if (!$isPhysical)
                                            selected
                                        @endif>Virtual</option>
                                    </x-backend.form.select-input>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mb-2">
                                    @if ($isPhysical)
                                    <x-backend.form.select-input label="Location" name="location" placeholder="Location">
                                        <option value="">Doctor</option>
                                        <option value="">Developer</option>
                                    </x-backend.form.select-input>
                                    @else
                                    <x-backend.form.select-input label="Location" name="location" placeholder="Location" disabled>
                                       
                                    </x-backend.form.select-input>
                                    @endif
                            </div>
                            <div class="col-lg-12 col-md-6 col-12 mb-2">
                                    <x-backend.form.text-input label="Subject" name="subject" type="text" placeholder="Subject" />
                            </div>
                            <div class="col-lg-12 col-12 mb-2">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" placeholder="Message" rows="4"></textarea>
                            </div>
                            <div class="col-lg-12 col-12 pb-2">
                                <div class="form-group px-3">
                                    <x-backend.ui.button class="btn-primary mt-2 text-white">Submit
                                    </x-backend.ui.button>
                                </div>
                            </div>
                        </div> --}}

                        <form method="POST" action="" class="">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <div style="max-width: 650px;" class="px-md-0 px-2">
                                    <div id="progressbarwizard">

                                        <div class="d-flex justify-content-center">
                                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100"
                                                role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a href="#account-2" data-bs-toggle="tab" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true"
                                                        role="tab" tabindex="-1">
                                                        <i class="mdi mdi-account-circle"></i>
                                                        <span class="d-none d-sm-inline">Account</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2 " aria-selected="false"
                                                        role="tab">
                                                        <i class="mdi mdi-office-building-marker"></i>
                                                        <span class="d-none d-sm-inline">Address</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a href="#finish" data-bs-toggle="tab" data-toggle="tab"
                                                        class="nav-link rounded-0 pt-2 pb-2" aria-selected="false"
                                                        role="tab" tabindex="-1">
                                                        <i class="mdi mdi-checkbox-marked-circle-outline "></i>
                                                        <span class="d-none d-sm-inline">Finish</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content ">

                                            <div id="bar" class="progress my-3" style="height: 7px;">
                                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                    style="width: 33.33%;"></div>
                                            </div>

                                            <div class="tab-pane my-3 active" id="account-2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <x-backend.form.select-input class="mb-3" name="location" label="Choose Location" placeholder="Choose Location...">
                                                            <option value="">Agrabad, Chattagram</option>
                                                            <option value="">Andarkella, Chattagram</option>
                                                        </x-backend.form.select-input>
                                                    </div>
                                                    <div class="col-12">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118103.47450132135!2d91.73746698943835!3d22.32591352860032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8a64095dfd3%3A0x5015cc5bcb6905d9!2z4Kaa4Kaf4KeN4Kaf4KaX4KeN4Kaw4Ka-4Kau!5e0!3m2!1sbn!2sbd!4v1687279949135!5m2!1sbn!2sbd" height="450" class="w-100 rounded shadow-sm" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane my-3 " id="profile-tab-2" role="tabpanel">
                                                <div class="">hello World</div>
                                            </div>
                                            <div class="tab-pane my-3" id="finish" role="tabpanel">
                                                <div class="">hello World</div>
                                            </div>

                                            <ul
                                                class="list-unstyled d-flex justify-content-md-start justify-content-between gap-3 mb-0 wizard">
                                                <li class="previous" id="prev-btn">
                                                    <a href="javascript: void(0);" class="btn btn-dark">Previous</a>
                                                </li>
                                                <li class="next" id="next-btn">
                                                    <a href="javascript: void(0);" class="btn btn-primary">Next</a>
                                                </li>
                                            </ul>

                                        </div> <!-- tab-content -->
                                    </div>
                                </div>

                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-frontend.testimonial-section :$testimonials>
    </x-frontend.testimonial-section>


    @pushOnce('cusotmJs')
        <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
        <script>
            $(document).ready(function() {
                const nextBtn = $('#next-btn')
                nextBtn.click(() => {
                    setTimeout(() => {
                        const isLast = $('#finish').hasClass('active');
                        console.log(isLast);
                        if (isLast) {
                            const submitBtn =
                                `<button type="submit" class="btn btn-primary">Submit</button>`
                            nextBtn.html(submitBtn)
                        }
                    }, 100);
                })
                const prevBtn = $('#prev-btn')
                prevBtn.click(() => {
                    const submitBtn = `<a href="javascript: void(0);" class="btn btn-primary">Next</a>`
                    nextBtn.html(submitBtn)
                })
            });
        </script>
    @endPushOnce
@endsection
