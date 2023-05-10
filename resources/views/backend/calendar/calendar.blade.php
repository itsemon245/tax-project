@extends('backend.layouts.app')

@section('content')
    @push('CustomCssAndJs')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        {{-- sweet alert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Backend', 'Calender']" />
    {{-- {{dd($events)}} --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" id="events" value="{{ $events }}">
                            <div class="col-md-12">
                                <div id="calendar"></div>
                            </div> <!-- end col -->
                            <div class="col-md-12">
                                <!-- Modal -->
                                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
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
                                                    <x-backend.form.text-input type="date" name="start_date"
                                                        label="Event Start Date" />
                                                    <x-backend.form.text-input type="date" name="end_date"
                                                        label="Event End Date" />
                                                    <x-backend.form.text-input name="event_desc"
                                                        label="Event Description" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add New Event MODAL -->

                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->
    </div>



    @push('customJs')
        <script></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        {{-- sweet alert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {

                var booking = $('#events').val()
                booking = JSON.parse(booking);
                var calendar = $('#calendar').fullCalendar({

                    header: {
                        left: 'prev,next, today',
                        right: 'title',
                    },
                    events: booking,
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDays) {
                        $('#eventModal').modal('toggle')
                    },

                    eventClick: function(event) {
                        var eventId = event.id;


                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('calendar.destroy', '') }}" + '/' + eventId,
                            method: 'DELETE',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', response.id)
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                            )
                                        }
                                    })
                                }


                            },
                            error: function(error) {
                                console.log(error)
                            }
                        })
                    }

                })
            })
        </script>
        <style>
            .fc .fc-toolbar {
                display: inline-block !important;
            }
        </style>
    @endpush
@endsection
