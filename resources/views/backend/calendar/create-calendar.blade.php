@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Backend', 'Calender']" />
    {{-- {{dd($events)}} --}}
    <span class="btn btn-sm btn-primary waves-effect waves-light" title="I&#39;m a Tippy tooltip!" tabindex="0"
        data-plugin="tippy" data-tippy-placement="top">Top</span>
    <input type="hidden" id="events" value="{{ $events }}">
    <x-backend.ui.section-card name="Calendar">
        {{-- calendar section  --}}
        <div class="row">
            <div class="col-md-10">
                <div id="calendar"></div>
            </div>
            <div class="col-md-2">
                <p class="text-center text-primary h5 mb-0">Todays Events</p>
                <div class="border-start border-top border-2 border-primary h-100 p-2 my-2">
                    {{-- Current events --}}
                </div>
            </div>
        </div>
        <!-- Modal for creating event -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <form action="{{ route('calendar.store') }}" method="post">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <x-backend.form.text-input name="event_name" label="Event Name" />
                            <x-backend.form.select-input id="services" label="Services" name="service"
                                placeholder="Select Service">
                                <option value="service 1">Service 1</option>
                                <option value="service 2">Service 2</option>
                                <option value="service 3">Service 3</option>
                            </x-backend.form.select-input>
                            <x-backend.form.select-input id="client" label="Client" name="client"
                                placeholder="Select Client">
                                <option value="client 1">Client 1</option>
                                <option value="client 2">Client 2</option>
                                <option value="client 3">Service 3</option>
                            </x-backend.form.select-input>
                            <x-backend.form.text-input type="datetime-local" name="start_date" id="start-date"
                                label="Start Date" />
                            <x-backend.form.text-input name="event_description" label="Event Description" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal for showing event -->
        <div class="modal fade" id="eventShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="eventTitle">Dummy Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <x-backend.ui.button id="deleteBtn" type="delete" action="" class="text-capitalize btn-sm" />
                        <x-backend.ui.button class="btn-info text-capitalize btn-sm" id="editBtn">Edit
                        </x-backend.ui.button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for updating event -->
        <div class="modal fade" id="eventUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <x-backend.form.select-input id="service" label="Services" name="service"
                                placeholder="Select Service">
                                <option value="service 1">Service 1</option>
                                <option value="service 2">Service 2</option>
                                <option value="service 3">Service 3</option>
                            </x-backend.form.select-input>
                            <x-backend.form.select-input id="client" label="Client" name="client"
                                placeholder="Select Client">
                                <option value="client 1">Client 1</option>
                                <option value="client 2">Client 2</option>
                                <option value="client 3">Service 3</option>
                            </x-backend.form.select-input>
                            <x-backend.form.text-input type="datetime-local" name="start_date" id="start-date"
                                label="Start Date" />
                            <x-backend.form.text-input id="description" name="event_description"
                                label="Event Description" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>



    @push('customJs')
        <script src="{{ asset('backend/assets/libs/tippy.js/tippy.all.min.js') }}"></script>
        {{-- full calender plugin  --}}
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.7/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.7/index.global.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.7/index.global.min.js"></script>
        {{-- sweet alert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var myEvents = $('#events').val()
                myEvents = JSON.parse(myEvents);
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    dateClick: function(info) {
                        let date = info.dateStr + "T00:00:00"
                        $('#eventModal').modal('toggle')
                        $('#start-date').val(date);
                    },
                    events: myEvents,
                    eventContent: function(info) {
                        let client = 'Client Name';
                        let service = 'service';
                        let title = info.event.title
                        let time = info.timeText
                        let bg = info.isToday ? 'bg-danger' : 'bg-blue'
                        let html = `
                            <div class="w-100 text-light ${bg} p-1 rounded"
                            title="${client}" tabindex="0" data-plugin="tippy" data-tippy-placement="top">
                                <div class="d-flex justify-content-end align-items-center">
                                    <strong class="mx-auto">${title}</strong>
                                    <sup class="">${time}</sup>
                                </div>
                                <p class='text-light mb-0'>${service}</p>
                            </div>
                            `

                        return {
                            html: html
                        }
                    },
                    editable: true,

                    eventDrop: function(info) {
                        // console.log(info.event);
                        let date = new Date(info.event.start)
                        let startDate = date.toISOString()
                        startDate = startDate.replace('Z', '')
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
                                start_date: startDate,
                                event_description: info.event.extendedProps.description
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
                        client.text(info.event.extendedProps.client)
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
                            $('#eventUpdateModal').modal('toggle') //open modal to update event
                        })
                    }
                });
                calendar.render();
            });
        </script>
        <style>
            .fc .fc-toolbar {
                display: inline-block !important;
            }
        </style>
    @endpush
@endsection
