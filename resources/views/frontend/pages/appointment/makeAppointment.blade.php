@extends('frontend.layouts.app')

@section('main')
    <x-frontend.hero-section :banners="$banners" />

    <div class="bg-white pb-5 pt-3">
        <div class="container">
            <h2 class="text-center py-3">Make Appointment</h2>

            <form method="POST" action="" class="">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="w-100" style="max-width: 650px;" class="px-md-0 px-2">
                        <div id="progressbarwizard">

                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                                    @if ($isPhysical)
                                        <li class="nav-item" role="presentation">
                                            <a href="#account-2" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link d-flex flex-column flex-md-row align-items-center justify-content-center gap-md-2 rounded-0 pt-2 pb-2 active"
                                                aria-selected="true" role="tab" tabindex="-1">
                                                <i class="mdi mdi-map-marker"></i>
                                                <span class="d-none d-sm-inline">Location</span>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item" role="presentation">
                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link d-flex flex-column flex-md-row align-items-center justify-content-center gap-md-2 rounded-0 pt-2 pb-2 "
                                            aria-selected="false" role="tab">
                                            <i class="mdi mdi-calendar-clock"></i>
                                            <span class="d-none d-sm-inline">Date & Time</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#tab-3" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link d-flex flex-column flex-md-row align-items-center justify-content-center gap-md-2 rounded-0 pt-2 pb-2 "
                                            aria-selected="false" role="tab">
                                            <i class="mdi mdi-account"></i>
                                            <span class="d-none d-sm-inline">Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#finish" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link d-flex flex-column flex-md-row align-items-center justify-content-center gap-md-2 rounded-0 pt-2 pb-2"
                                            aria-selected="false" role="tab" tabindex="-1">
                                            <i class="mdi mdi-eye "></i>
                                            <span class="d-none d-sm-inline">Preview</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <div class="tab-content ">

                                <div id="bar" class="progress my-3" style="height: 7px;">
                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        style="width: 25%;"></div>
                                </div>

                                @if ($isPhysical)
                                    <div class="tab-pane my-3 active" id="account-2" role="tabpanel">
                                        <div class="row">
                                            <h4 class="text-center mb-2">
                                                Which office do you prefer?
                                            </h4>
                                            <div class="col-12">
                                                <input type="hidden" name="" id="maps-data" value="{{json_encode($maps)}}" >
                                                <x-backend.form.select-input id="location" class="mb-3" name="location"
                                                    label="Choose Location" placeholder="Choose Location..." required>
                                                    @foreach ($maps as $map)
                                                        <option value="{{ $map->id }}">{{ $map->location }}</option>
                                                    @endforeach
                                                </x-backend.form.select-input>
                                            </div>
                                            <div class="col-12">
                                                <iframe id="map"
                                                    src="{{$maps[0]->src}}"
                                                    height="450" class="w-100 rounded shadow-sm" style="border:0;"
                                                    allowfullscreen="" loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                                <div class="tab-pane my-3 " id="profile-tab-2" role="tabpanel">
                                    <h4 class="text-center mb-2">
                                        Which time works best for you?
                                    </h4>
                                    <x-backend.form.text-input type='date' class="mb-2" label="Choose Date"
                                        name="date" required />
                                    <x-backend.form.text-input type='time' class="mb-2" label="Choose Time"
                                        name="time" required />
                                </div>
                                <div class="tab-pane my-3" id="tab-3" role="tabpanel">
                                    <div class="row">
                                        <x-backend.form.text-input type='text' class="mb-2" label="Name"
                                            name="name" required />
                                        <x-backend.form.text-input type='text' class="mb-2" label="Email"
                                            name="email" required />
                                        <x-backend.form.text-input type='text' class="mb-2" label="Phone"
                                            name="phone" required />
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div class="flex-grow-1">
                                                <label for="district">District <span class="text-danger">*</span></label>
                                                <select class="w-100" id="district" name="district"
                                                    placeholder="Select District..." required>
                                                </select>
                                            </div>
                                            <div class="flex-grow-1">
                                                <label for="thana">Thana <span class="text-danger">*</span></label>
                                                <select class="w-100" id="thana" name="thana"
                                                    placeholder="Select Thana..." required>
                                                    <option disabled selected>Select District First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane my-3" id="finish" role="tabpanel">
                                    <!-- Will be rendered using js -->
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

    <x-frontend.testimonial-section :$testimonials>
    </x-frontend.testimonial-section>


    @push('customJs')
        {{-- Selectize start --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
            integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
            integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Selectize end --}}
        <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
        <script>
            $(document).ready(function() {
                let office = {}
                let date = ''
                let time = ''
                let name = ''
                let email = ''
                let phone = ''
                let district = ''
                let thana = ''

                let districtSelctize = $('#district').selectize({
                    maxItems: 1,
                    sortField: 'text',
                    create: false,
                    labelField: 'district',
                    valueField: 'district',
                    searchField: 'district',
                });
                let thanaSelect = $('#thana').selectize({
                    maxItems: 1,
                    sortField: 'text',
                    create: true,
                    labelField: 'thana',
                    valueField: 'thana',
                    searchField: ['thana', 'id'],
                });

                const settings = {
                    async: true,
                    crossDomain: true,
                    url: 'https://bdapi.p.rapidapi.com/v1.1/division/chattogram',
                    method: 'GET',
                    headers: {
                        'X-RapidAPI-Key': '3fdd0dc0f2mshcea4717a7ec6a05p1e2854jsn1bce68040ab7',
                        'X-RapidAPI-Host': 'bdapi.p.rapidapi.com'
                    }
                };

                $.ajax(settings).done(function(response) {
                    const data = response.data;
                    console.log(data);
                    const selectize = districtSelctize[0].selectize
                    selectize.clear();
                    selectize.clearOptions();
                    selectize.load(set => set(data));

                    //set eventlistenr for district select
                    $('#district').on('input', e => {
                        district = e.target.value
                        // grab ups based on district
                        const UP = data.filter(item => item.district === e.target.value)[0].upazilla
                        const upazillas = UP.map(item => {
                            return {
                                thana: item,
                                id: item.toLowerCase
                            }
                        })
                        const thanaSelecize = thanaSelect[0].selectize
                        thanaSelecize.clear();
                        thanaSelecize.clearOptions();
                        thanaSelecize.load(set => set(upazillas));

                    })
                });

                thanaSelect.on('input', e => {
                    thana = e.target.value
                })
                $("input[name='name']").on('input', e => {
                    name = e.target.value
                })
                $("input[name='phone']").on('input', e => {
                    phone = e.target.value
                })
                $("input[name='email']").on('input', e => {
                    email = e.target.value
                })
                $("input[name='date']").on('input', e => {
                    date = e.target.value
                })
                $("input[name='time']").on('input', e => {
                    time = e.target.value
                })





                const location = $('#location')
                const mapsData = JSON.parse($('#maps-data').val())
                location.on('input', e => {
                    const mapId = parseInt(e.target.value)
                    office =  mapsData.filter(item => item.id===mapId)[0]
                    console.log(office);
                    const url = office.src
                    $('#map').attr('src', url)
                })
                
                
                const nextBtn = $('#next-btn')
               
               
                nextBtn.click(() => {

                    setTimeout(() => {
                        const isLast = $('#finish').hasClass('active');
                        const officeBody = `<p class="fw-bold>${office.location}</p>
                                            <div>${office.address}</div>`
                        if (isLast) {
                            console.log(office);
                            const html = `
                            <div class="card">
                                <p class="card-header text-center">Appointment Details</p>
                                <div class="card-body px-5">
                                    <p class="text-dark p-2 border bg-light rounded"><span
                                            class="fw-bold">Name: </span>${name}</p>
                                    <p class="text-dark p-2 border bg-light rounded"><span
                                            class="fw-bold">Email: </span>${email}</p>
                                    <p class="text-darkp-2 p-2 border bg-light rounded"><span
                                            class="fw-bold">Phone: </span>${phone}</p>
                                    <div class="d-flex gap-3 p-2 border bg-light rounded mb-2">
                                        <p class="text-dark mb-0"><span class="fw-bold">District:
                                            </span>${district}</p>
                                        <p class="text-dark mb-0"><span class="fw-bold">Thana: </span>${thana}
                                        </p>
                                    </div>
                                    <p class="text-darkp-2 p-2 border bg-light rounded"><span
                                            class="fw-bold">Time: </span>${date}, ${time}</p>
                                    <div class="card">
                                        <div class="card-header fs-5">Office</div>
                                        <div class="card-body" id="address-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>`
                            $('#finish').html(html)
                            console.log($('#address-body').html(officeBody));
                            $('#address-body').html(officeBody)
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
    @endPush
@endsection
