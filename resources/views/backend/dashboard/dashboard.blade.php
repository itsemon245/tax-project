@extends('backend.layouts.app')
@pushOnce('customCss')
    <link rel="stylesheet" href="{{ asset('libs/apexcharts/dist/apexcharts.css') }}">
@endPushOnce
@section('content')
    <!-- start page title -->

    <!-- end page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard']" />

    <x-backend.ui.section-card>
        <x-backend.ui.recent-update-invoice :method="route('invoice.create')" />
        <x-ui.calendar :currentEvents="$currentEvents" :events="$events" :services="$services" :clients="$clients" />
        {{-- Project Progress Starts --}}
        <h3 class="fw-bold text-center mb-3 mt-5">Project Progress</h3>
        <div id="progressbarwizard">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#daily" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 active"
                            aria-selected="true" role="tab" tabindex="-1">
                            <i class="mdi mdi-clock-time-two-outline"></i>
                            <span class="d-none d-sm-inline">Daily</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#weekly" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                            aria-selected="false" role="tab" tabindex="-1">
                            <i class="mdi mdi-table-clock"></i>
                            <span class="d-none d-sm-inline">Weekly</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#monthly" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                            aria-selected="false" role="tab" tabindex="-1">
                            <i class="mdi mdi-table-clock"></i>
                            <span class="d-none d-sm-inline">Monthly</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#total" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0"
                            aria-selected="false" role="tab" tabindex="-1">
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
                            @forelse ($projects as $project)
                                @php
                                    $progress = $project->daily_target === 0 ? 100 : ($project->daily_progress * 100) / $project->daily_target;
                                    $progress = round($progress);
                                    $color = match (true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress > 30 && $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                @endphp
                                <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                    <div class="bar progress-bar {{ $color }}" style="width: {{ $progress }}%;">
                                        <span class="text-light font-18 fw-bold">{{ $progress }}%</span>
                                    </div>
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
                            @forelse ($projects as $project)
                                @php
                                    $weekly_progress = $project->daily_progress / $project->weekly_target;
                                    $progress = $project->weekly_target === 0 ? 100 : $weekly_progress * 100;
                                    $progress = round($progress);
                                    $color = match (true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress > 30 && $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                @endphp
                                <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                    <div class="bar progress-bar {{ $color }}" style="width: {{ $progress }}%;">
                                        <span class="text-light font-18 fw-bold">{{ $progress }}%</span>
                                    </div>
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
                            @forelse ($projects as $project)
                                @php
                                    $progress = ($project->daily_progress / $project->monthly_target) * 100;
                                    $progress = round($progress);
                                    $color = match (true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress > 30 && $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                @endphp
                                <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                    <div class="bar progress-bar {{ $color }}"
                                        style="width: {{ $progress }}%;"><span
                                            class="text-light font-18 fw-bold">{{ $progress }}%</span></div>
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
                            @forelse ($projects as $project)
                                @php
                                    $progress = ($project->daily_progress / $project->total_clients) * 100;
                                    $progress = round($progress);
                                    $color = match (true) {
                                        $progress <= 30 => 'bg-danger',
                                        $progress > 30 && $progress <= 60 => 'bg-warning',
                                        default => 'bg-success',
                                    };
                                @endphp
                                <span class="text-dark font-16 fw-bold">{{ $project->name }}:</span>
                                <div id="bar" class="progress mb-2 w-100" style="height: max-content;">
                                    <div class="bar progress-bar {{ $color }}"
                                        style="width:{{ $progress }}%;"><span
                                            class="text-light font-18 fw-bold">{{ $progress }}%</span></div>
                                </div>
                            @empty
                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                            @endforelse
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- tab-content -->
        </div>
        {{-- Project Progress Ends --}}
        @php
            $number = new \NumberFormatter('en_IN', \NumberFormatter::DEFAULT_STYLE);
            $arearClients = $fiscalYear
                ->invoices()
                ->select(['client_id'])
                ->whereHas('fiscalYears', function ($query) {
                    $query->where('status', 'due');
                })
                ->distinct()
                ->get();
            $paidClients = $fiscalYear
                ->invoices()
                ->select(['client_id'])
                ->whereHas('fiscalYears', function ($query) {
                    $query->where('status', 'paid');
                })
                ->distinct()
                ->get();
            $partialClients = $fiscalYear
                ->invoices()
                ->select(['client_id'])
                ->whereHas('fiscalYears', function ($query) {
                    $query->where('status', 'partial');
                })
                ->distinct()
                ->get();
        @endphp
        <div class="row my-5">
            <div class="fs-4 fw-bold mb-2">Stats</div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light h-100">
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
                            <div class="col-12">
                                <div class="float-end fw-bold fs-5">Clients : <span
                                        data-plugin="counterup">{{ $fiscalYear->invoices()->select(['client_id'])->distinct()->count() }}</span>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light h-100">
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
                            <div class="col-12">
                                <div class="float-end fw-bold fs-5">Clients: <span
                                        data-plugin="counterup">{{ $paidClients->count() + $partialClients->count() }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-start fw-bold">Full Paid: <span
                                        data-plugin="counterup">{{ $paidClients->count() }}</span>
                                </div>
                                <div class="float-end fw-bold">Partial Paid: <span
                                        data-plugin="counterup">{{ $partialClients->count() }}</span>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light h-100">
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
                            <div class="col-12">
                                <div class="float-end fw-bold fs-5">Clients: <span
                                        data-plugin="counterup">{{ $arearClients->count() + $partialClients->count() }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-start fw-bold">
                                    <div>
                                        Full Due: <span data-plugin="counterup">{{ $arearClients->count() }}</span>
                                    </div>
                                    <div>
                                        Amount: <span data-plugin="counterup">{{ $arearClients->sum('due') }}</span>
                                    </div>
                                </div>
                                <div class="float-end fw-bold">Partial Due: <span
                                        data-plugin="counterup">{{ $partialClients->count() }}</span>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div>
            {{-- <div class="col-lg-3 col-md-6">
                <div class="widget-rounded-circle card w-100 bg-light h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-blue border-blue border shadow">
                                    <span class="mdi mdi-cash font-22 avatar-title text-white"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span
                                            data-plugin="counterup">{{ $number->format($fiscalYear->invoices()->select('due')->sum('due')) }}</span>&#2547
                                    </h3>
                                    <p class="text-dark fs-4 fw-bold mb-1 text-truncate">Expenses</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-end fw-bold fs-5">Clients: <span
                                        data-plugin="counterup">{{ $arearClients + $partialClients }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="float-start fw-bold">Full Due: <span
                                        data-plugin="counterup">{{ $arearClients }}</span>
                                </div>
                                <div class="float-end fw-bold">Partial Due: <span
                                        data-plugin="counterup">{{ $partialClients }}</span>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> --}}
        </div>

        <div class="row mb-2 justify-content-center">
            <div id="chart"></div>
        </div>



    </x-backend.ui.section-card>
@endsection
@push('customJs')
    {{-- Apex Charts --}}
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script>
        let url = "{{ route('get.chart.data') }}"

        $.ajax({
            type: "get",
            url: url,
            success: function(response) {
                let series = response
                let options = {
                    chart: {
                        type: 'bar'
                    },
                    series: series,
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return `<div class="font-14 fw-bold">${val}<span class='fw-bold fs-5 ms-1'>&#2547;</span></div>`
                            }
                        }
                    },
                    title: {
                        text: 'Invoice Amount Details',
                        floating: true,
                        offsetY: 0,
                        style: {
                            color: '#444'
                        }
                    }
                }

                let chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            }
        });
    </script>
@endpush
