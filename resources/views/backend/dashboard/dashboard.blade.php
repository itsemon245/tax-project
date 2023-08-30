@extends('backend.layouts.app')
@section('content')
                            <!-- start page title -->
                            <div class="row mb-2">
                                <div class="col-12 d-flex justify-content-between">
                                    <h4 class="page-title mt-3 ">Dashboard</h4>
                                    <p id="datetime" class="mt-3"></p>
                                </div>
                            </div>     
                            <!-- end page title --> 
    
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="widget-rounded-circle card W-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                        <i class="fe-heart font-22 avatar-title text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span>&#2547</h3>
                                                        <p class="text-muted mb-1 text-truncate">Expenses</p>
                                                    </div>
                                                </div>
                                            </div> <!-- end row-->
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </div> <!-- end col-->
                                <div class="col-md-4">
                                    <div class="widget-rounded-circle card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                        <i class="fe-shopping-cart font-22 avatar-title text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span>&#2547</h3>
                                                        <p class="text-muted mb-1 text-truncate">Demand</p>
                                                    </div>
                                                </div>
                                            </div> <!-- end row-->
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </div> <!-- end col-->
    
                                <div class="col-md-4">
                                    <div class="widget-rounded-circle card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                        <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="text-end">
                                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">0.58</span>%</h3>
                                                        <p class="text-muted mb-1 text-truncate">Arrear</p>
                                                    </div>
                                                </div>
                                            </div> <!-- end row-->
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </div> <!-- end col-->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="widget-rounded-circle card W-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="avatar-lg w-100 rounded-circle bg-pink border-pink border shadow" style="height: 240px;">
                                                        <h4 class="avatar-title text-white">Total Clients<span>300</span></h4>
                                                    </div>
                                                </div>
                                            </div> <!-- end row-->
                                        </div>
                                    </div> <!-- end widget-rounded-circle-->
                                </div> <!-- end col-->
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center">Projects</h4>
                                            <div id="progressbarwizard ">
                                                <div class="d-flex justify-content-center">
                                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a href="#daily" data-bs-toggle="tab" data-toggle="tab"
                                                                class="nav-link rounded-0 active" aria-selected="true"
                                                                role="tab" tabindex="-1">
                                                                <i class="mdi mdi-clock-time-two-outline"></i>
                                                                <span class="d-none d-sm-inline">Daily</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a href="#weekly" data-bs-toggle="tab" data-toggle="tab"
                                                                class="nav-link rounded-0" aria-selected="false" role="tab"
                                                                tabindex="-1">
                                                                <i class="mdi mdi-table-clock"></i>
                                                                <span class="d-none d-sm-inline">Weekly</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a href="#monthly" data-bs-toggle="tab" data-toggle="tab"
                                                                class="nav-link rounded-0" aria-selected="false" role="tab"
                                                                tabindex="-1">
                                                                <i class="mdi mdi-table-clock"></i>
                                                                <span class="d-none d-sm-inline">Monthly</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a href="#total" data-bs-toggle="tab" data-toggle="tab"
                                                                class="nav-link rounded-0" aria-selected="false" role="tab"
                                                                tabindex="-1">
                                                                <i class="mdi mdi-table-clock"></i>
                                                                <span class="d-none d-sm-inline">Total</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content ">
                                                    <div class="tab-pane my-3 active" id="daily" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @forelse ($clients[0]->projects as $project)
                                                                @php
                                                                    $progress = $project->daily_target === 0 ? 100 : ($project->daily_progress * 100) / $project->daily_target; 
                                                                    $progress = round($progress);
                                                                    $color = match( true) {
                                                                    $progress <= 30 => 'bg-danger',
                                                                    $progress <= 60 => 'bg-warning',
                                                                    default => 'bg-success',
                                                                };
                                                                @endphp
                                                                <span class="text-dark">{{ $project->name }}:</span>
                                                                <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}%;"><span class="text-light">{{ $progress }}%</span></div>
                                                                </div>
                                                                @empty
                                                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                                                @endforelse
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>
                                                    <div class="tab-pane my-3" id="weekly" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @forelse ($clients[0]->projects as $project)
                                                                @php
                                                                 $progress = $project->weekly_target === 0 ? 100 : ($project->weekly_progress * 100) / $project->weekly_target; 
                                                                $progress = round($progress);
                                                                $color = match( true) {
                                                                    $progress <= 30 => 'bg-danger',
                                                                    $progress <= 60 => 'bg-warning',
                                                                    default => 'bg-success',
                                                                };
                                                                @endphp
                                                                <span class="text-dark">{{ $project->name }}:</span>
                                                                <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width: {{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
                                                                </div>
                                                                @empty
                                                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                                                @endforelse
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>
                                                    <div class="tab-pane my-3" id="monthly" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @forelse ($clients[0]->projects as $project)
                                                                @php
                                                                $progress = $project->monthly_target === 0 ? 100 : ($project->monthly_progress * 100) / $project->monthly_target; 
                                                                $progress = round($progress);
                                                                $color = match( true) {
                                                                $progress <= 30 => 'bg-danger',
                                                                $progress <= 60 => 'bg-warning',
                                                                default => 'bg-success',
                                                                };
                                                                @endphp
                                                                <span class="text-dark">{{ $project->name }}:</span>
                                                                <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width: {{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
                                                                </div>
                                                                @empty
                                                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                                                @endforelse
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>
                                                    <div class="tab-pane my-3" id="total" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                @forelse ($clients[0]->projects as $project)
                                                                @php
                                                                $progress = $project->total_clients === 0 ? 100 : ($project->total_progress * 100) / $project->total_clients; 
                                                                $progress = round($progress);
                                                                $color = match( true) {
                                                                $progress <= 30 => 'bg-danger',
                                                                $progress <= 60 => 'bg-warning',
                                                                default => 'bg-success',
                                                                };
                                                                @endphp
                                                                <span class="text-dark">{{ $project->name }}:</span>
                                                                <div id="bar" class="progress mb-2 w-100" style="height: 15px;">
                                                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated {{ $color }}" style="width:{{ $progress }}%;"><span class="text-light">{{ $progress }}%</span></div>
                                                                </div>
                                                                @empty
                                                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                                                @endforelse
                                                            </div>
                                                        </div> <!-- end row -->
                                                    </div>
                                                </div> <!-- tab-content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />
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
                    <div id="myButton" data-tippy-content="Client: ${client}" class="w-100 text-light ${bg} rounded" style="padding: 3px;max-width:100%;">
                        <div class="d-flex justify-content-between align-items-baseline" style="gap:3px;">
                            <div>
                                <strong class="">${title}</strong>
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

        tippy('#myButton', {
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
    // Function to update the date and time every second
    function updateDateTime() {
        const datetimeElement = document.getElementById('datetime');
        const currentDate = new Date();
        datetimeElement.innerText = currentDate.toLocaleString();
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>

<!-- Add this script below the HTML structure in your Blade view file -->
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
    });
</script>
@endpush