@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Report', 'Demand']" />

    <x-backend.ui.section-card name="Ledger">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
                class="mdi mdi-chevron-down fs-5"></span>
        </div>
        {{-- TODO: change advance search options here --}}
        <div class="container">
            <table class="table border table-responsive ">
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
                                    {{ $item->invoices()->sum('demand') }} <span
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
            </table>
        </div>
        <div class="card">
            <h5 class="card-header bg-soft-light text-dark text-capitalize">Ledger Statement</h5>
            <div class="card-body">

                <x-backend.table.basic>
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
                            <th>Demand</th>
                            <th>Paid</th>
                            <th>Arear</th>
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
                                <td class="fw-bold">{{ $invoice->fiscalYears[0]->pivot['demand'] }} <span
                                    class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                                </td>
                                <td class="fw-bold">{{ $invoice->fiscalYears[0]->pivot['paid'] }} <span
                                    class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                                </td>
                                <td class="fw-bold">{{ $invoice->fiscalYears[0]->pivot['due'] }} <span
                                    class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>

            </div>
        </div>


    </x-backend.ui.section-card>

    <!-- end row-->

@endsection
