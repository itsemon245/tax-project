@extends('backend.layouts.app')

@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Report', 'Demand']" />

    <x-backend.ui.section-card :name="ucwords(str($type)->plural())">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
                class="mdi mdi-chevron-down fs-5"></span>
        </div>
        {{-- TODO: change advance search options here --}}
        {{-- <div id="advance-search-options" class="card rounded-3 d-none mt-2" style="border: 2px solid var(--ct-gray-500);">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <x-form.selectize class="mb-1 advance-filter-options" id="client" name="client"
                            placeholder="Select Client..." label="Client" :canCreate="false">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-form.selectize class="mb-1 advance-filter-options" id="reference" name="reference"
                            placeholder="Select Reference..." label="Reference" :canCreate="false">
                            @foreach ($references as $reference)
                                <option value="{{ $reference }}">{{ $reference }}</option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-backend.form.select-input class="advance-filter-options mb-2" label="Payment Stauts"
                            name="payment_status" placeholder="Payment Stauts">
                            @foreach (['draft', 'sent', 'partial', 'paid', 'due', 'overdue'] as $status)
                                <option value="{{ $status }}">{{ str($status)->title() }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-backend.form.select-input class="advance-filter-options mb-2" name="fiscal_year" label="Year"
                            placeholder="Year">
                            @foreach (range(currentYear(), 2020) as $year)
                                <option value="{{ $year - 1 . '-' . $year }}" @selected($year === currentYear())>
                                    {{ str($year - 1 . '-' . $year)->title() }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <div class="col-lg-6">
                        <x-range-slider class="advance-filter-options" name="demand" id="demand" from="100"
                            to="100000" step='50' icon="mdi mdi-currency-bdt"></x-range-slider>
                    </div>
                    <div class="col-lg-6">
                        <x-range-slider class="advance-filter-options" name="paid" id="paid" from="100"
                            to="100000" step='50' icon="mdi mdi-currency-bdt"></x-range-slider>
                    </div>
                    <div class="col-lg-6">
                        <x-range-slider class="advance-filter-options" name="arear" id="arear" from="100"
                            to="100000" step='50' icon="mdi mdi-currency-bdt"></x-range-slider>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-backend.form.text-input class="advance-filter-options mb-2" name="date_from"
                                    label="Start Date" type="date" />
                            </div>
                            <div class="col-sm-6">
                                <x-backend.form.text-input class="advance-filter-options mb-2" name="date_to"
                                    label="End Date" type="date" />
                            </div>
                            <div class="col-sm-6">
                                <x-form.selectize class="advance-filter-options mb-2" id="circle" name="circle"
                                    label="Circle" placeholder="Select Circle" :canCreate="false">
                                    @foreach ($circles as $circle)
                                        <option value="{{ $circle }}">{{ str($circle)->title() }}</option>
                                    @endforeach
                                </x-form.selectize>
                            </div>
                            <div class="col-sm-6">
                                <x-form.selectize class="advance-filter-options mb-2" id="zone" name="zone"
                                    label="Zone" placeholder="Select Zone" :canCreate="false">
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone }}">{{ str($zone)->title() }}</option>
                                    @endforeach
                                </x-form.selectize>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <div class="float-end">
                            <x-backend.ui.button type="custom" href="{{ route('invoice.index') }}"
                                class="btn-sm btn-outline-danger">Reset
                            </x-backend.ui.button>
                            <x-backend.ui.button type="button" id="advance-search-close" class="btn-sm btn-outline-dark">
                                Close
                            </x-backend.ui.button>
                            <x-backend.ui.button id="apply-btn" type="button"
                                class="btn-sm btn-primary">Apply</x-backend.ui.button>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
        <div class="container">
            <x-backend.table.basic :items="$fiscalYears">
                <thead>
                    <tr>
                        <th class="border bg-soft-dark text-dark">Year</th>
                        @foreach ($fiscalYears as $item)
                            <th class="border">{{ $item->year }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border bg-soft-dark text-dark">
                            Amount
                        </th>
                        @foreach ($fiscalYears as $item)
                            <th class="border">
                                @if ($item->invoices()->count() > 0)
                                    {{ $item->invoices()->sum($type) }} <span
                                        class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                                @else
                                    <div class="text-warning">
                                        No Invoices Yet
                                    </div>
                                @endif
                            </th>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="border bg-soft-dark text-dark">Client</th>
                        @foreach ($fiscalYears as $item)
                            <th class="border">
                                @if ($item->invoices()->count() > 0)
                                    {{ $item->invoices()->select('client_id')->distinct()->count() }}
                                @else
                                    <div class="text-warning">
                                        No Invoices Yet
                                    </div>
                                @endif
                            </th>
                        @endforeach
                    </tr>
                </tbody>
            </x-backend.table.basic>
        </div>
        <div class="card">
            <h5 class="card-header bg-soft-light text-dark text-capitalize">All {{ str($type)->plural() }}</h5>
            <div class="card-body">

                <x-backend.table.basic :items="$fiscalYears">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Client Name</th>
                            <th>TIN</th>
                            <th>Reference</th>
                            <th>Phone</th>
                            <th>Circle</th>
                            <th>Zone</th>
                            @foreach ($fiscalYears as $item)
                                <th>{{ $item->year }}</th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $key => $invoice)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td class="fw-medium">
                                    {{ Carbon\Carbon::parse($invoice->fiscalYears[0]->pivot->issue_date)->format('d M, Y') }}
                                </td>
                                <td class="fw-medium">{{ $invoice->client->name }}</td>
                                <td>{{ $invoice->client->tin }}</td>
                                <td>{{ $invoice->reference_no }}</td>
                                <td>{{ $invoice->client->phone }}</td>
                                <td>{{ $invoice->client->circle }}</td>
                                <td>{{ $invoice->client->zone }}</td>
                                @foreach ($fiscalYears as $year)
                                    @php
                                        $inv = $year->invoices()->find($invoice->id);
                                    @endphp
                                    @if ($inv)
                                        <td class="fw-bold">{{ $inv->pivot[$type] }} <span
                                                class="mdi mdi-currency-bdt font-16 fw-bold"></span></td>
                                    @else
                                        <td class="fw-bold">
                                            <div class="text-warning">
                                                No Invoices Yet
                                            </div>
                                        </td>
                                    @endif
                                @endforeach

                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>
                <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>


    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
    @endpush
@endsection
