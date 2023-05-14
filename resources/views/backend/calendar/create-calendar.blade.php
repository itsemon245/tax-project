@extends('backend.layouts.app')

@section('content')
    @push('CustomCssAndJs')
    @endpush
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
        <!-- Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
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
                            <x-backend.form.text-input name="event_desc" label="Event Description" />
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
        <script src="{{ asset('backend/assets/libs/tippy.js/tippy.all.min.js"') }}"></script>
        {{-- full calender plugin  --}}
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.7/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.7/index.global.min.js'></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.7/index.global.min.js"></script>
        {{-- sweet alert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // $(document).ready(function() {

            //     var booking = $('#events').val()
            //     booking = JSON.parse(booking);
            //     var calendar = $('#calendar').fullCalendar({

            //         header: {
            //             left: 'prev,next, today',
            //             right: 'title',
            //         },
            //         events: booking,
            //         selectable: true,
            //         selectHelper: true,
            //         select: function(start, end, allDays) {
            //             $('#eventModal').modal('toggle')
            //         },
            //         // editable: true,

            //         // eventDrop: function(event) {
            //         //     var id = event.id;
            //         //     var start_date = moment(event.start).format('YYYY-MM-DD');
            //         //     // var end_date = moment(event.end).format('YYYY-MM-DD');

            //         //     console.log(id,start_date, end_date)

            //         //     $.ajax({
            //         //         headers: {
            //         //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         //         },
            //         //         url: "{{ route('calendar.destroy', '') }}" + '/' + id,
            //         //         type: "PUT",
            //         //         data: {
            //         //             start_date,
            //         //             // end_date
            //         //         },
            //         //         success: function(response) {
            //         //             console.log(response)
            //         //             if (response.success) {
            //         //                 const Toast = Swal.mixin({
            //         //                     toast: true,
            //         //                     position: 'top-end',
            //         //                     showConfirmButton: false,
            //         //                     timer: 3000,
            //         //                     timerProgressBar: true,
            //         //                     didOpen: (toast) => {
            //         //                         toast.addEventListener('mouseenter',
            //         //                             Swal
            //         //                             .stopTimer)
            //         //                         toast.addEventListener('mouseleave',
            //         //                             Swal
            //         //                             .resumeTimer)
            //         //                     }
            //         //                 })

            //         //                 Toast.fire({
            //         //                     icon: 'success',
            //         //                     title: 'Updated in successfully'
            //         //                 })
            //         //             }
            //         //         },
            //         //         error: function(error) {
            //         //             console.log(error)
            //         //         },
            //         //     });
            //         // },

            //         eventClick: function(event) {
            //             var eventId = event.id;

            //             if (confirm('Do you want to delete this event?')) {
            //                 $.ajax({
            //                     headers: {
            //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //                     },
            //                     url: "{{ route('calendar.destroy', '') }}" + '/' + eventId,
            //                     method: 'DELETE',
            //                     success: function(response) {

            //                         if (response.success) {
            //                             $('#calendar').fullCalendar('removeEvents', response.id)
            //                             const Toast = Swal.mixin({
            //                                 toast: true,
            //                                 position: 'top-end',
            //                                 showConfirmButton: false,
            //                                 timer: 3000,
            //                                 timerProgressBar: true,
            //                                 didOpen: (toast) => {
            //                                     toast.addEventListener('mouseenter',
            //                                         Swal
            //                                         .stopTimer)
            //                                     toast.addEventListener('mouseleave',
            //                                         Swal
            //                                         .resumeTimer)
            //                                 }
            //                             })

            //                             Toast.fire({
            //                                 icon: 'success',
            //                                 title: 'Deleted in successfully'
            //                             })
            //                         }


            //                     },
            //                     error: function(error) {
            //                         console.log(error)
            //                     },
            //                 })
            //             }

            //         }

            //     })
            // })


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
                    eventContent: function(arg) {
                        let client = 'Client Name';
                        let service = 'service';
                        let title = arg.event.title
                        let time = arg.timeText
                        let bg = arg.isToday ? 'bg-danger' : 'bg-blue'
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
                        let url = "{{ route('event.dragUpdate', ':id') }}"
                        url = url.replace(":id", id)

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
