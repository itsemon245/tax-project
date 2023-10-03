@php
    $categories = App\Models\ServiceCategory::get();
    $fetch = App\Models\Setting::get()[0]->basic;
@endphp
<footer class="top-footer bg-dark">
    <div class="px-5 mx-3 text-white py-3">
        <div class="row justify-content-center">
            <div class="col-12 mb-3">
                <div class="row justify-content-center">
                    <h6 class="text-center font-20">Our Services</h6>
                    @foreach ($categories as $category)
                        <div
                            class=" {{ count($category->serviceSubCategories) < 2 ? 'col-xl-2 col-md-4' : 'col-xl-4 col-md-6' }}">
                            <a class="fw-medium font-18 d-flex justify-content-md-center mb-2"
                                href="{{ route('service.category', $category->id) }}" target="_blank"
                                rel="noopener noreferrer">{{ $category->name }}</a>
                            <ul class="row mx-0  list-unstyled mb-2">
                                @foreach ($category->serviceSubCategories as $sub)
                                    <li
                                        class="{{ count($category->serviceSubCategories) < 2 ? 'col-md-12' : 'col-sm-6' }} mb-2">
                                        <a class="fw-medium mb-2"
                                            href="{{ route('service.sub', $sub->id) }}">{{ $sub->name }}</a>
                                        <ul class="" style="list-style: disc; mx-0">
                                            @foreach ($sub->services as $service)
                                                <li class="">
                                                    <a
                                                        href="{{ route('service.view', $service->id) }}">{{ $service->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="row mb-2">
                    <p class="mb-1 text-center" style="font-weight: 500;font-size:18px;">
                        <a href="{{ route('page.about') }}">About Us</a>
                    </p>
                    <div>
                        <div class="d-flex justify-content-center gap-5" style="font-weight: 500; font-size: 16px;">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="">Terms &
                                Codition</a>
                            <a href="#" target="_blank" rel="noopener noreferrer" class="">Help &
                                Support</a>
                        </div>
                        <div class="d-flex justify-content-center gap-5" style="font-weight: 500; font-size: 16px;">
                            <a href="#" target="_blank" rel="noopener noreferrer" class="">Terms &
                                Codition</a>
                            <a href="#" target="_blank" rel="noopener noreferrer" class="">Help &
                                Support</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-5" style="font-weight: 500; font-size: 16px;">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="">Terms & Codition</a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="">Help & Support</a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <p class="mb-1 text-center" style="font-weight: 500;font-size:18px;">
                            <a href="{{ route('page.about') }}">Contact us</a>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div style="font-weight: 500; font-size: 16px;">
                            {{ $fetch->address }}
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <a href="mailto:{{ $basic->email }}" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
                            E-mail : {{ $basic->email }}
                        </a>
                        <a href="tel:{{ $basic->phone }}" class="d-inline-block px-2 pb-1" style="cursor: pointer;">
                            Phone : {{ $basic->phone }}
                        </a>
                        <a href="https://wa.me/{{ $basic->whatsapp }}/?text=Hi Sam, Whatsup" class="d-inline-block px-2 pb-1"
                            style="cursor: pointer;">
                            WhatsApp : {{ $basic->whatsapp }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="row text-light">
                    <p class="mb-1 text-center" style="font-weight: 500;font-size:18px;">Stay Connected</p>
                    @foreach (getRecords('social_handles') as $social)
                        <div class="col-lg-4 col-6">
                            <span class="{{ $social->icon }}"></span>
                            <a class="text-capitalize" href="{{ $social->link }}" target="_blank"
                                rel="noopener noreferrer">{{ $social->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="bottom-footer bg-primary text-light mt-3">
        <h6 class="d-flex text-dark align-items-center justify-content-center mb-0">Copyright <span
            class="mdi mdi-copyright mx-2"></span>
        {{ Carbon\Carbon::now()->format('Y') }} all rights reserved by {{ env('APP_NAME') }}
        <span class="mx-4 text-dark" >
            <span class="mx-4">|</span> Develop by: <a href="#">..... Soft.</a>
        </span>
    </h6>
    </div>
</footer>
