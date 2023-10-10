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
            <div class="col-md-6">
                <div class="row mb-2">
                    <p class="mb-1 text-center" style="font-weight: 500;font-size:18px;">
                        <a href="{{ route('page.about') }}">About Us</a>
                    </p>
                    <div class="fw-bold">Address:</div>
                    <div style="font-weight: 500; font-size: 16px;max-width:30ch;">
                        {{ $fetch->address }}
                    </div>
                    <div>
                        <div class="fw-bold mt-3">Contact Details:</div>
                        <a href="mailto:{{ $basic->email }}" target="_blank" rel="noopener noreferrer"
                            style="font-weight: 500; font-size: 16px;display:block;">
                            Email: {{ $basic->email }}
                        </a>
                        <a href="mailto:{{ $basic->phone }}" target="_blank" rel="noopener noreferrer"
                            style="font-weight: 500; font-size: 16px;display:block;">
                            Phone: {{ $basic->phone }}
                        </a>
                        <a href="https://wa.me/{{ $basic->whatsapp }}/?text=Hi TaxacBD, Whatsup" target="_blank" rel="noopener noreferrer"
                            style="font-weight: 500; font-size: 16px;display:block;">
                            Whatsapp: {{ $basic->whatsapp }}
                        </a>
                    </div>

                    <div class="d-flex gap-2 flex-wrap mt-3">
                        <a class="fw-medium" href="#" target="_blank" rel="noopener noreferrer" class="">Terms & Codition</a>
                        <span>|</span>
                        <a class="fw-medium" href="#" target="_blank" rel="noopener noreferrer" class="">Help & Support</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row text-light justify-content-center">
                    <p class="mb-1 text-center" style="font-weight: 500;font-size:18px;">Stay Connected</p>
                    @foreach (getRecords('social_handles') as $social)
                        <div class="col-6 col-sm-4 col-md-6 col-xl-4">
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
        <div class="d-flex text-dark align-items-center justify-content-center flex-wrap p-2">
            <p class="mb-0 text-center fw-medium">Copyright <span class="font-18 mx-2">&#169;</span>
                {{ Carbon\Carbon::now()->format('Y') }} all rights reserved by {{ env('APP_NAME') }}</p>
            <span class="mx-2 mx-md-4 d-none d-sm-inline ">|</span>
            <hr class="my-2 d-sm-none bg-dark" style="height: 2px;width:80%;"></hr>
            <a class="fw-medium text-white" style="text-decoration: underline!important;" href="#" target="_blank" rel="noopener noreferrer">Contact
                Developers</a>
        </div>
    </div>
</footer>
