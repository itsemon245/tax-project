@extends('frontend.layouts.app')

@section('main')
    @pushOnce('customCss')
        <style>
            .selected {
                background: var(--bs-primary);
                color: var(--bs-dark);
            }
        </style>
    @endPushOnce
    <x-frontend.hero-section :banners="$banners" />

    <div class="bg-white pb-5 pt-3">
        <div class="container">
            <h2 class="text-center py-3">Make Appointment</h2>

            <form method="POST" action="{{ route('user-appointment.store') }}" class="">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="w-100" style="max-width: 720px;" class="px-md-0 px-2">
                        <div id="progressbarwizard">

                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab"
                                            class="nav-link d-flex flex-column flex-md-row align-items-center justify-content-center gap-md-2 rounded-0 pt-2 pb-2 active"
                                            aria-selected="true" role="tab" tabindex="-1">
                                            <i class="mdi mdi-calendar-clock"></i>
                                            <span class="d-none d-sm-inline">Date & Time</span>
                                        </a>
                                    </li>

                                    @auth
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    @endauth
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

                                <div class="tab-pane my-3 active" id="account-2" role="tabpanel">

                                    <div class="row justify-content-between px-2">
                                        <div class="col-md-6 mb-3">
                                            <h4 class="col-12">
                                                What time works best for you?
                                            </h4>
                                            <a href="{{ route('appointment.make').($office ? "?office_id=" . $office?->id : '') }}" for="appointment-input"
                                                class="row mb-1 text-dark" style="cursor: pointer;">
                                                <div id="appointment-type"
                                                    class="border bg-light rounded p-3 appointment-type appointment">
                                                    <h4>Together in Office</h4>
                                                    <p class="text-muted mb-0">Work with a tax pro at a tax office near you.
                                                        We are committed to helping you file your taxes in a way that's easy
                                                        and safe for you.</p>
                                                </div>
                                                <input type="radio" class="location-input" name="is_physical"
                                                    data-effected="#appointment-type" data-cards=".appointment"
                                                    id="appointment-input" value="{{ true }}" hidden>
                                            </a>
                                            <a href="{{ route('appointment.virtual') }}" for="appointment-input-2"
                                                class="row mb-1" style="cursor: pointer;">
                                                <div id="appointment-type-2"
                                                    class="border rounded p-3 appointment-type selected appointment">
                                                    <h4>Virtually</h4>
                                                    <p class="text-muted mb-0">Get expert tax filing help anywhere, anyway
                                                    </p>
                                                </div>
                                                <input type="radio" class="location-input" name="is_physical"
                                                    value="{{ false }}" data-effected="#appointment-type-2"
                                                    data-cards=".appointment" id="appointment-input-2" hidden checked>
                                            </a>
                                        </div>
                                        <div class="col-md-6 time-selector">
                                            <h4>What time works best for you?</h4>
                                            <div class="border rounded p-3" style="overflow-y: scroll; height:400px;">
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($dates as $date => $times)
                                                @php
                                                    $i++;
                                                @endphp
                                                <div class="mb-3">
                                                    <div class="fw-bold">{{ $date }}
                                                    </div>

                                                    <div class="d-flex flex-wrap gap-2 ps-2">
                                                        @foreach ($times as $key => $time)
                                                            <label
                                                                class="time-label rounded border p-2 {{ $key === 0 && $i === 1 ? 'selected' : 'bg-light' }}">
                                                                {{ \Carbon\Carbon::parse($time)->timezone('Asia/Dhaka')->format('h:i A') }}
                                                                <input class="time-input " hidden type="radio"
                                                                    name="time"
                                                                    data-date="{{ $date }}"
                                                                    value="{{ $time }}"
                                                                    @if ($key === 0 && $i === 1) checked @endif>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane my-3" id="tab-3" role="tabpanel">
                                    <div class="row">
                                        <x-backend.form.text-input type='text' class="mb-2 user-info" label="Name"
                                            name="name" data-target="#push-name" :value="auth()->user() !== null ? auth()->user()->name : ''" required />
                                        <x-backend.form.text-input type='text' class="mb-2 user-info" label="Email"
                                            name="email" data-target="#push-email" :value="auth()->user() !== null ? auth()->user()->email : ''" required />
                                        <x-backend.form.text-input type='text' class="mb-2 user-info" label="Phone"
                                            name="phone" data-target="#push-phone" :value="auth()->user() !== null ? auth()->user()->phone : ''" required />
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div class="flex-grow-1">
                                                <label for="district">District <span class="text-danger">*</span></label>
                                                <select class="w-100 user-info" id="district" name="district"
                                                    data-target="#push-district" placeholder="Select District..."
                                                    required>
                                                </select>
                                            </div>
                                            <div class="flex-grow-1">
                                                <label for="thana">Thana <span class="text-danger">*</span></label>
                                                <select class="w-100 user-info" id="thana" name="thana"
                                                    data-target="#push-thana" placeholder="Select Thana..." required>
                                                    <option disabled selected>Select District First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane my-3" id="finish" role="tabpanel">
                                    <div class="card">
                                        <p class="card-header text-center">Appointment Details</p>
                                        <div class="card-body px-5">
                                            <p class="text-dark p-2 border bg-light rounded"><span class="fw-bold">Name:
                                                </span><span
                                                    id="push-name">{{ auth()->user() ? auth()->user()->name : '' }}</span>
                                            </p>
                                            <p class="text-dark p-2 border bg-light rounded"><span class="fw-bold">Email:
                                                </span><span
                                                    id="push-email">{{ auth()->user() ? auth()->user()->email : '' }}</span>
                                            </p>
                                            <p class="text-darkp-2 p-2 border bg-light rounded"><span
                                                    class="fw-bold">Phone: </span><span
                                                    id="push-phone">{{ auth()->user() ? auth()->user()->phone : '' }}</span>
                                            </p>
                                            <div class="row p-2 border bg-light rounded mb-3 w-100 mx-0">
                                                <p class="col-6 text-dark mb-0"><span class="fw-bold">District:
                                                    </span><span id="push-district"></span></p>
                                                <p class="col-6 text-dark mb-0"><span class="fw-bold">Thana: </span><span
                                                        id="push-thana"></span></p>
                                            </div>
                                            <div class="row p-2 border bg-light rounded mb-3 w-100 mx-0">
                                                <p class="col-6 text-dark mb-0"><span class="fw-bold">Date:
                                                    </span><span id="push-date"></span></p>
                                                <p class="col-6 text-dark mb-0"><span class="fw-bold">Time: </span><span
                                                        id="push-time"></span></p>
                                            </div>
                                            <input type="date" id="push-date-value" name="date" hidden>
                                            {{-- <div id="office-body">
                                                <div class="card">
                                                    <div class="card-header fs-5">Office</div>
                                                    <div class="card-body" id="address-body">
                                                        <p class='fw-bold mb-1' id="">{{ $maps[0]->location }}
                                                        </p>
                                                        <div class="text-muted" id="">{!! $maps[0]->address !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
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
    {{-- Lets discuss --}}
    <x-section.discuss-section/>
    {{-- Appoinment Section --}}
    <div>
        <x-frontend.appointment-section />
    </div>
    <x-frontend.testimonial-section :$testimonials />


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
                //set the first map as default office
                const nextBtn = $('#next-btn')
                const prevBtn = $('#prev-btn')


                // initialize selectize for thana and district
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

                // options for fetching divisions
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

                //fetch divisions
                $.ajax(settings).done(function(response) {
                    const data = response.data;
                    const selectize = districtSelctize[0].selectize
                    selectize.clear();
                    selectize.clearOptions();
                    selectize.load(set => set(data));

                    //set eventlistenr for district select
                    $('#district').on('input', e => {
                        const target = $(e.target.dataset.target)
                        target.text(e.target.value)
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

                //on thana change
                thanaSelect.on('input', e => {
                    const target = $(e.target.dataset.target)
                    target.text(e.target.value)
                })

                //on userinfo change
                $('.user-info').each((i, item) => {
                    item.addEventListener('input', e => {
                        const target = $(e.target.dataset.target)
                        target.text(e.target.value)
                    })
                })

                // on time click
                $('.time-input').each((i, input) => {
                    if (i === 0) {
                        let date = input.dataset.date
                        let time = input.value
                        let dateValue = new Date(date)
                        dateValue = dateValue.toISOString().split('T')[0]
                        $('#push-date').text(date)
                        $('#push-time').text(time)
                        $('#push-date-value').val(dateValue)
                    }
                    input.addEventListener('input', e => {
                        const parent = $(input).parent();
                        $('.time-label').addClass('bg-light')
                        parent.removeClass('bg-light');
                        parent.addClass('selected');
                        const date = e.target.dataset.date
                        const time = e.target.value
                        let dateValue = new Date(date)
                        dateValue = dateValue.toISOString().split('T')[0]
                        $('#push-date').text(date)
                        $('#push-time').text(time)
                        $('#push-date-value').val(dateValue)
                    })
                })

                // on next btn click
                nextBtn.click(() => {
                    setTimeout(() => {
                        // check if the tab is last
                        const isLast = $('#finish').hasClass('active');

                        if (isLast) {
                            const submitBtn =
                                `<button type="submit" class="btn btn-primary">Submit</button>`
                            nextBtn.html(submitBtn)
                        }
                    }, 100);
                })
                prevBtn.click(() => {
                    const submitBtn = `<a href="javascript: void(0);" class="btn btn-primary">Next</a>`
                    nextBtn.html(submitBtn)
                })
            });
        </script>
    @endPush
@endsection
