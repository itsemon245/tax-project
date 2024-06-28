@extends('backend.layouts.app')
@pushOnce('customCss')
    <link rel="stylesheet" href="{{ asset('libs/apexcharts/dist/apexcharts.css') }}">
    <style>
        .stat-report table {
            width: 100%;
        }

        .tab-content th {
            padding: 0;
        }

        .tab-content td {
            padding: 0.5rem;
        }

        .stat-report {
            padding: 4px;
        }

        @media not all and (min-width: 640px) {
            .stat-report h3 {
                font-size: 16px;
                padding: 4px;
            }

            .stat-report td {
                padding: 4px;
            }

            .stat-report td>h3 {
                padding: 0;
            }

        }
    </style>
@endPushOnce
@section('content')
    <!-- start page title -->

    <!-- end page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard']" />

    <x-backend.ui.section-card>
        @hasrole('expert')
        
        @endhasrole

        @can('read invoice')
            <x-backend.ui.recent-update-invoice :method="route('invoice.create')" />
        @endcan
        <x-ui.calendar :currentEvents="$currentEvents" :events="$events" :services="$services" :clients="$clients" />

        @hasanyrole(['admin', 'super admin'])
            {{-- Project Progress Starts --}}
            <h3 class="fw-bold text-center mb-3 mt-5">Stat Report</h3>
            <div id="progressbarwizard">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                        @foreach ($statReports as $time => $reports)
                            <li class="nav-item" role="presentation">
                                <a href="#{{ $time }}-stat" data-bs-toggle="tab" data-toggle="tab"
                                    class="nav-link rounded-0 {{ $time == 'daily' ? 'active' : '' }}"
                                    aria-selected="{{ $time == 'daily' ? 'true' : 'false' }}" role="tab" tabindex="-1">
                                    <i class="mdi mdi-clock-time-two-outline"></i>
                                    <span class="d-none d-sm-inline">{{ ucfirst($time) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content stat-report">
                    @foreach ($statReports as $time => $reports)
                        <div class="tab-pane my-3 {{ $time == 'daily' ? 'active' : '' }}" id="{{ $time }}-stat"
                            role="tabpanel">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>
                                                <h3 class="my-0 p-2">Name</h3>
                                            </th>
                                            <th>
                                                <h3 class="text-center bg-blue my-0 p-2">Total</h3>
                                            </th>
                                            <th>
                                                <h3 class="text-center bg-success my-0 p-2">Completed</h3>
                                            </th>
                                            <th>
                                                <h3 class="text-center bg-danger my-0 p-2">Pending</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $name => $stats)
                                            <tr>
                                                <td>
                                                    <h3>{{ ucfirst($name) }}</h3>
                                                </td>
                                                @foreach ($stats as $stat)
                                                    <td>
                                                        <h4 class="text-center">{!! $stat !!}</h4>
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end row -->
                        </div>
                    @endforeach
                </div> <!-- tab-content -->
            </div>
            {{-- Project Progress Ends --}}
        @endhasanyrole

        @can('read progress')
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
                                        $progress =
                                            $project->daily_target === 0
                                                ? 100
                                                : ($project->daily_progress * 100) / $project->daily_target;
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
                                        <div class="bar progress-bar {{ $color }}"
                                            style="width: {{ $progress }}%;">
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
        @endcan

        @can('read invoice')
            @php
                $number = new \NumberFormatter('en_IN', \NumberFormatter::DEFAULT_STYLE);
                $arearClients = $fiscalYear
                    ->invoices()
                    ->select(['client_id'])
                    ->whereHas('fiscalYears', function ($query) {
                        $query->where('status', 'due');
                        $query->orWhere('status', 'overdue');
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
                <div class="col-xxl-3 col-md-6 mb-xxl-0 mb-3">
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
                <div class="col-xxl-3 col-md-6 mb-xxl-0 mb-3">
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
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="float-start fw-bold">
                                        <div class="text-start">
                                            Amount: <span class="mdi-currency-bdt"></span> <span
                                                data-plugin="counterup">{{ $paidClients->sum('pivot.paid') }}</span>
                                        </div>
                                        <div class="text-start">
                                            Full Paid: <span data-plugin="counterup">{{ $paidClients->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="float-start fw-bold">
                                        <div class="text-end">
                                            Amount: <span class="mdi-currency-bdt"></span> <span
                                                data-plugin="counterup">{{ $partialClients->sum('pivot.paid') }}</span>
                                        </div>
                                        <div class="text-end">
                                            Partial Paid: <span data-plugin="counterup">{{ $partialClients->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>
                <div class="col-xxl-3 col-md-6 mb-xxl-0 mb-3">
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
                                <div class="col-12 d-flex align-items-center justify-content-between">
                                    <div class="float-start fw-bold">
                                        <div class="text-start">
                                            Amount: <span class="mdi-currency-bdt"></span> <span
                                                data-plugin="counterup">{{ $arearClients->sum('pivot.due') }}</span>
                                        </div>
                                        <div class="text-start">
                                            Full Due: <span data-plugin="counterup">{{ $arearClients->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="float-start fw-bold">
                                        <div class="text-end">
                                            Amount: <span class="mdi-currency-bdt"></span> <span
                                                data-plugin="counterup">{{ $partialClients->sum('pivot.due') }}</span>
                                        </div>
                                        <div class="text-end">
                                            Partial Due: <span data-plugin="counterup">{{ $partialClients->count() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>
                <div class="col-xxl-3 col-md-6 mb-xxl-0 mb-3">
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
                                        <h3 class="text-dark mt-1"> <span
                                                data-plugin="counterup">{{ $expenses->today }}</span>&#2547
                                        </h3>
                                        <p class="text-dark fs-4 fw-bold mb-1 text-truncate">Expenses</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="float-end fw-bold fs-5">Total: <span class="mdi-currency-bdt"></span>
                                        <span data-plugin="counterup">{{ $expenses->total }}</span>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>
            </div>

            <div class="row mb-2 justify-content-center">
                <div id="chart"></div>
            </div>
        @endcan



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
