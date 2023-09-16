@extends('backend.layouts.app')
@pushOnce('customCss')
    <link rel="stylesheet" href="{{ asset('libs/apexcharts/dist/apexcharts.css') }}">
@endPushOnce
@section('content')
    <!-- start page title -->

    <!-- end page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard']" />

    <x-backend.ui.section-card>
        {{-- Calendar --}}
        <div class="mb-3">
            <div class="row">
                <input type="hidden" id="events" value="{{ $events }}">

                <div class="col-md-9">
                    <div class="h-100">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="h-100">
                        <p class="text-center text-primary h5 mb-0">Todays Events</p>
                        <div class="border-start border-top border-2 border-primary h-100 p-2 my-2 bg-light">
                            <div class="d-flex flex-column gap-1 currentEvents "
                                style="max-height: 70dvh;overflow-y:scroll;">
                                @forelse ($currentEvents as $group => $events)
                                    <div class="card mb-2 shadow-md" id="event-group-{{ str($group)->slug() }}">
                                        <div class="card-header py-1 px-2 bg-white border-bottom" role="button">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="text-dark fw-bold">
                                                    {{ $group === 'others' ? 'Others' : 'Invoice ' . str($group)->headline() }}
                                                </div>
                                                <span data-items="{{ $events->pluck('id') }}"
                                                    data-url="{{ route('mark.event.completed') }}"
                                                    data-parent="#event-group-{{ str($group)->slug() }}"
                                                    data-tippy-content="Check All"
                                                    class="complete-event tippy mdi mdi-check-all font-16 text-success"></span>
                                            </div>
                                        </div>
                                        <div class="card-body p-1 ">
                                            <ul class="list-unstyled mb-0 ps-2">
                                                @foreach ($events as $key => $event)
                                                    <li class="mb-2" id="event-{{ $event->id }}">
                                                        <div class="d-flex gap-1 align-items-center">
                                                            <div data-tippy-content="Client: {{ $event->client?->name }}"
                                                                class="tippy w-100 bg-danger text-white rounded"
                                                                style="padding: 3px;max-width:100%;">
                                                                <div class="d-flex justify-content-between align-items-baseline"
                                                                    style="gap:3px;">
                                                                    <div>
                                                                        <div
                                                                            class="text-capitalize fw-bold text-wrap text-start">
                                                                            {{ ++$key }}.
                                                                            {{ $event->title }}</div>
                                                                        <p class='text-white m-0 text-capitalize'
                                                                            style="text-align:left;">
                                                                            Service: {{ $event->service }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span data-items="{{ $event->id }}"
                                                                data-url="{{ route('mark.event.completed') }}"
                                                                data-parent="#event-{{ $event->id }}"
                                                                data-tippy-content="Check" style="padding: 0.2rem 0.3rem;"
                                                                class="complete-event tippy mdi mdi-check font-16 bg-soft-success text-success rounded-circle"></span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div id="myButton" class="myButton event-{{ $event->id }}"
                                        data-tippy-content="Client: {{ $event->client->name }}"
                                        class="w-100 text-light bg-danger rounded" style="padding: 5px;max-width:100%;">
                                        <div class="d-flex justify-content-between align-items-baseline" style="gap:3px;">
                                            <div>
                                                <strong class="">{{ $event->title }}</strong>
                                                <p class='text-light m-0 text-capitalize' style="text-align:left;">
                                                    {{ $event->service }}</p>
                                            </div>
                                            <div class="" style="font-size: 12px;">
                                                {{ Carbon\Carbon::parse($event->start)->format('h:m a') }}</div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-success text-center">
                                        <strong>No events for today</strong>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="servicesData" value="{{ $services }}">
            <!-- Modal for creating event -->
            @can('create event')
                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <form action="{{ route('calendar.store') }}" method="post">
                                @csrf

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <x-backend.form.text-input name="event_name" label="Event Name" />

                                    <x-form.selectize id="service" name="service" placeholder="Select Service..."
                                        label="Service">
                                        @foreach ($services as $item)
                                            <option value="{{ $item->service }}">{{ $item->service }}</option>
                                        @endforeach
                                    </x-form.selectize>
                                    <x-backend.form.select-input id="client" label="Client" name="client"
                                        placeholder="Select Client">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </x-backend.form.select-input>
                                    <x-backend.form.text-input type="datetime-local" name="start_date" id="start-date"
                                        label="Start Date" />
                                    <x-backend.form.text-input name="event_description" label="Event Description" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Create Event</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
            <!-- Modal for showing event -->
            @canany(['delete event', 'update event', 'read event'])
                <div class="modal fade" id="eventShowModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-capitalize" id="eventTitle">Dummy Title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="px-4">
                                <p class="mb-0">
                                    <span>With: </span>
                                    <span class="badge bg-success px-1 text-caplitalize" id="client">Client name</span>
                                </p>
                                <p>
                                    <span>Service: </span>
                                    <span class="badge bg-blue px-1 text-caplitalize" id="service">dummy service</span>
                                </p>
                                <p class="text-muted" id="description">
                                    dummy description
                                </p>
                            </div>
                            <div class="modal-footer">
                                @can('delete event')
                                    <x-backend.ui.button id="deleteBtn" type="delete" action=""
                                        class="text-capitalize btn-sm" />
                                @endcan
                                @can('update event')
                                    <x-backend.ui.button class="btn-info text-capitalize btn-sm" id="editBtn">Edit
                                    </x-backend.ui.button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endcanany
            <!-- Modal for updating event -->
            <div class="modal fade" id="eventUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <form action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <x-backend.form.text-input id="eventTitle" name="event_name" label="Event Name" />

                                <x-form.selectize id="service" name="service" placeholder="Select Service..."
                                    label="Service">
                                    @foreach ($services as $item)
                                        <option value="{{ null }}" selected disabled>Select Service</option>
                                        <option value="{{ $item->service }}">{{ $item->service }}</option>
                                    @endforeach
                                </x-form.selectize>

                                <x-backend.form.select-input id="client" label="Client" name="client"
                                    placeholder="Select Client">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </x-backend.form.select-input>
                                <x-backend.form.text-input type="datetime-local" name="start_date" id="start-date"
                                    label="Start Date" />
                                <x-backend.form.text-input id="description" name="event_description"
                                    label="Event Description" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Calender ends --}}
        @php
            $number = new \NumberFormatter('en_IN', \NumberFormatter::DEFAULT_STYLE);
        @endphp
        <div class="row my-5">
            <div class="fs-4 fw-bold mb-2">Invoices</div>
            <div class="col-lg-4 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                    <span class="mdi mdi-cash-usd font-22 avatar-title text-white"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span
                                            data-plugin="counterup">{{ $number->format($fiscalYear->invoices()->select('demand')->sum('demand')) }}</span>&#2547
                                    </h3>
                                    <p class="text-dark fs-4 fw-bold mb-1 text-truncate">Demand</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                    <span class="mdi mdi-cash-check font-22 avatar-title text-white"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span
                                            data-plugin="counterup">{{ $number->format($fiscalYear->invoices()->select('paid')->sum('paid')) }}</span>&#2547
                                    </h3>
                                    <p class="text-dark fs-4 fw-bold mb-1 text-truncate">Paid</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-danger border-danger border shadow">
                                    <span class="mdi mdi-account-cash font-22 avatar-title text-white"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span
                                            data-plugin="counterup">{{ $number->format($fiscalYear->invoices()->select('due')->sum('due')) }}</span>&#2547
                                    </h3>
                                    <p class="text-dark fs-4 fw-bold mb-1 text-truncate">Arear</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
        </div>

        <div class="row mb-2 justify-content-center">
            @foreach ($chartData as $key => $item)
                <div class="col-6">
                    <div id="chart-{{ $key }}"></div>
                </div>
            @endforeach
        </div>



    </x-backend.ui.section-card>
@endsection
@push('customJs')
    <script src="{{ asset('backend/assets/libs/tippy.js/tippy.all.min.js') }}"></script>
    {{-- full calender plugin  --}}
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.7/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.7/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.7/index.global.min.js"></script>
    {{-- sweet alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- tippy js --}}
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myEvents = $('#events').val()
            myEvents = JSON.parse(myEvents);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: myEvents,
                dateClick: function(info) {
                    let date = info.dateStr + "T00:00:00"
                    $('#eventModal').modal('toggle')
                    $('#start-date').val(date);
                },
                eventContent: function(info) {
                    let client = info.event.extendedProps.client.name;
                    let service = info.event.extendedProps.service;
                    let title = info.event.title
                    let time = info.timeText
                    let bg = info.isToday ? 'bg-danger' : 'bg-blue'
                    let html = `
                    <div data-tippy-content="Client: ${client}" class="tippy w-100 text-light ${bg} rounded" style="padding: 3px;max-width:100%;">
                        <div class="d-flex justify-content-between align-items-baseline" style="gap:3px;">
                            <div>
                                <div class="text-capitalize fw-bold text-wrap text-start">${title}</div>
                                <p class='text-light m-0 text-capitalize' style="text-align:left;">${service}</p>
                            </div>
                            <sup class="">${time}</sup>
                        </div>
                    </div>
                    `

                    return {
                        html: html
                    }
                },
                editable: true,

                eventDrop: function(info) {
                    let date = new Date(info.event.start)
                    let time = "T" + date.getHours() + ":" + date.getMinutes();
                    if (date.getHours() < 6) {
                        date.setDate(date.getDate() + 1)
                    }
                    let startDate = date.toISOString()
                    startDate = startDate.split('T')
                    const newDate = startDate[0] + time;
                    console.log(newDate);
                    let id = info.event._def.publicId;
                    let url = `{{ route('event.dragUpdate', ':id') }}`
                    url = url.replace(':id', id)

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: url,
                        method: "patch",
                        data: {
                            event_name: info.event.title,
                            start_date: newDate,
                        },
                        success: function(response) {
                            console.log(response)
                            if (response.success) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter',
                                            Swal
                                            .stopTimer)
                                        toast.addEventListener('mouseleave',
                                            Swal
                                            .resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: response.message
                                })
                            }
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },
                eventClick: function(info) {
                    const title = $('#eventShowModal #eventTitle')
                    const client = $('#eventShowModal #client')
                    const service = $('#eventShowModal #service')
                    const description = $('#eventShowModal #description')
                    const editBtn = $('#editBtn')
                    const deleteForm = $('#eventShowModal form')
                    let id = info.event._def.publicId;
                    let url = `{{ route('calendar.destroy', ':id') }}`
                    url = url.replace(':id', id)
                    //set form action to delete item
                    deleteForm.attr('action', url)
                    //set content for the event
                    title.text(info.event.title)
                    client.text(info.event.extendedProps.client.name)
                    service.text(info.event.extendedProps.service)
                    description.text(info.event.extendedProps.description)


                    $('#eventShowModal').modal('toggle') //open modal to show event

                    //set event listener for edit btn
                    editBtn.click(e => {
                        const title = $('#eventUpdateModal #eventTitle')
                        const form = $('#eventUpdateModal form')
                        const client = $('#eventUpdateModal #client')
                        const service = $('#eventUpdateModal #service')
                        const description = $('#eventUpdateModal #description')
                        const startDateInput = $('#eventUpdateModal #start-date')
                        let date = new Date(info.event.start)
                        let startDate = date.toISOString()
                        startDate = startDate.replace('Z', '')
                        url = url.replace('destroy', 'update')
                        $('#eventShowModal').modal('toggle') //close modal to show event

                        //populate the update form
                        form.attr('action', url);
                        title.val(info.event.title)
                        description.val(info.event.extendedProps.description)
                        startDateInput.val(startDate);
                        //select client and service in the select input
                        triggerSelected(client.children(), info.event.extendedProps.client_id)
                        triggerSelected(service.children(), info.event.extendedProps.service)
                        setTimeout(() => {
                            $('#eventUpdateModal').modal('toggle')
                        }, 500); //open modal to update event
                    })
                }
            });
            calendar.render();

            tippy('.tippy', {
                animation: 'scale',
            });

            function triggerSelected(array, value) {
                $.each(array, function(index, element) {
                    element.setAttribute('selected', element.value == value)
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            // Hide all dropdown contents initially
            $('.myButton').hide();

            // Handle click event on the title
            $('.enent-type').click(function() {
                var eventId = $(this).data('event-id');
                var dropdownContent = $('.event-' + eventId);

                // Hide all other dropdowns
                $('.myButton').not(dropdownContent).slideUp();

                // Toggle the visibility of the selected dropdown content
                dropdownContent.slideToggle();
            });

            $('.complete-event').click(e => {
                let url = e.target.dataset.url
                let items = e.target.dataset.items
                if (items.indexOf('[') >= 0) {
                    items = items.replace('[', '')
                    items = items.replace(']', '')
                }
                items = items.split(',')
                let parent = $(e.target.dataset.parent)

                $.ajax({
                    type: "patch",
                    url: url,
                    data: {
                        'ids': items
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            Toast.fire({
                                'icon': 'success',
                                'title': 'Success',
                                'text': response.message
                            })
                            parent.remove()
                        }
                    }
                });
            })
        });
    </script>

    {{-- Apex Charts --}}
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        let url = "{{ route('get.chart.data') }}"
        $.ajax({
            type: "get",
            url: url,
            success: function(response) {
                console.log(response);
                response.forEach((item, i) => {
                    let options = {
                        chart: {
                            type: 'bar'
                        },
                        series: [{
                            name: item.year,
                            data: item.data
                        }],
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " Invoices"
                                }
                            }
                        },
                        title: {
                            text: 'Invoice Status Count for Year ' + item.year,
                            floating: true,
                            offsetY: 0,
                            style: {
                                color: '#444'
                            }
                        }
                    }

                    let chart = new ApexCharts(document.querySelector("#chart-" + i), options);
                    chart.render();
                });
            }
        });
    </script>
@endpush
