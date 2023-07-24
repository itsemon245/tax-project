@extends('backend.layouts.app')
@php
    $from = (int) now()
        ->subYears(20)
        ->format('Y');
    $to = (int) now()->format('Y');
@endphp

@push('customCss')
    <link rel="stylesheet" href="{{ asset('libs/nouislider/dist/nouislider.min.css') }}">
    <script>
        function customToolTip(value, name) {
            let index = parseInt(value.toFixed(0)) - 1
            let months = [
                "January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
                "November", "December"
            ]
            if (name = name) {
                return months[index];
            }
        }
    </script>
@endpush

@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Invoice', 'List']" />

    <x-backend.ui.section-card name="Invoices">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
                class="mdi mdi-chevron-down fs-5"></span>
        </div>
        <div id="advance-search-options" class="card rounded-3 d-none mt-2" style="border: 2px solid var(--ct-gray-500);">
            <form action="javasript: void(0);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <x-form.selectize class="mb-1" id="client" name="client" placeholder="Select Client..."
                                label="Client" :canCreate="false">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </x-form.selectize>
                        </div>
                        <div class="col-md-4">
                            <x-form.selectize class="mb-1" id="reference" name="reference"
                                placeholder="Select Reference..." label="Reference" :canCreate="false">
                                @foreach ($references as $reference)
                                    <option value="{{ $reference }}">{{ $reference }}</option>
                                @endforeach
                            </x-form.selectize>
                        </div>
                        <div class="col-md-4">
                            <x-backend.form.select-input label="Payment Stauts" placeholder="Payment Stauts">
                                @foreach (['draft', 'sent', 'partial', 'paid', 'due', 'overdue'] as $status)
                                    <option value="{{ $status }}">{{ str($status)->title() }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-lg-4">
                            <x-range-slider id="price" from="100" to="100000" step='50'
                                icon="mdi mdi-currency-bdt"></x-range-slider>
                        </div>
                        <div class="col-lg-4">
                            <x-range-slider id="issue month" :from="1" :to="12" tooltips="custom">
                            </x-range-slider>
                        </div>
                        <div class="col-lg-4">
                            <x-range-slider id="issue year" :from="$from" :to="$to">
                            </x-range-slider>
                        </div>
                        <div class="col-12">
                            <div class="float-end">
                                <x-backend.ui.button type="custom" href="{{ route('invoice.index') }}"
                                    class="btn-sm btn-outline-danger">Reset
                                </x-backend.ui.button>
                                <x-backend.ui.button type="button" id="advance-search-close"
                                    class="btn-sm btn-outline-dark">
                                    Close
                                </x-backend.ui.button>
                                <x-backend.ui.button type="button" class="btn-sm btn-primary">Apply</x-backend.ui.button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <h5 class="p-3">Recently Updated</h5>
        <div class="d-none d-sm-flex flex-wrap justify-content-center gap-3 mb-5"
            style="height:220px; overflow-x: hidden; overflow-y:hidden;">
            <a href="{{ route('invoice.create') }}" class="" style="width: clamp(160px, 180px, 200px);">
                <div class="card h-100 shadow" style="border: medium dashed var(--ct-gray-400);">
                    <div class="card-body h-100">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <span class="text-success fw-bold display-5">+</span>
                            <span class="fw-bold text-muted fs-4">New Invoice</span>
                        </div>
                    </div>
                </div>
            </a>
            @foreach (range(1, 8) as $item)
                <div class="" style="width: clamp(160px, 180px, 200px);">
                    <div class="card h-100 shadow border border-2">
                        <div class="card-body">
                            <p>0001</p>
                            <h6>Company Name</h6>
                            <p class='text-muted mb-0'>Issued: 1 Jul, 2023</p>
                            <p class='text-muted mb-0'>Due: 1 Agust, 2023</p>
                        </div>
                        <div class="bg-soft-success text-success w-100 p-1 text-center fw-bold" style="overflow:hidden;">
                            Sent
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card">
            <h5 class="card-header bg-soft-light text-dark">All Invoices</h5>
            <div class="card-body">

                <x-backend.table.basic>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client Info</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $key => $invoice)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $invoice->client->name }}</td>
                                <td>{{ Carbon\Carbon::parse($invoice->issue_date)->format('d M Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</td>
                                <td>
                                    <span class="fw-bold">{{ $invoice->amount_due . ' Tk' }}</span>
                                </td>
                                <td>{{ $invoice->status }}</td>
                                <td>
                                    <x-backend.ui.button type="custom" href="{{ route('invoice.show', $invoice->id) }}"
                                        class="btn-sm btn-dark">
                                        View</x-backend.ui.button>
                                    <x-backend.ui.button type="delete"
                                        action="{{ route('invoice.destroy', $invoice->id) }}" class="btn-sm" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>

            </div> <!-- end card body-->
        </div> <!-- end card -->


    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
        <script>
            $(document).ready(function() {
                const filterWrapper = $('#basic-datatable_filter')
                // removes serach text from label
                $('#basic-datatable_filter label').contents().filter(function() {
                    return this.nodeType === 3;
                }).remove();
                const search = $('#basic-datatable_filter input[type="search"]')
                const searchLabel = search.parent()
                const advanceSearch = $('#advance-search')
                const advanceSearchOptions = $('#advance-search-options')
                advanceSearchOptions.removeClass('d-none')
                advanceSearchOptions.hide()


                search
                    .removeClass('form-control form-control-sm')
                    .css({
                        'border': 'none',
                        'outline': 'transparent',
                        'padding': 0,
                        'margin-left': 8
                    })
                    .attr('placeholder', 'Search')
                searchLabel
                    .prepend('<span class="fas fa-search"></span>')
                    .css({
                        'border': '2px solid var(--ct-gray-500)',
                        'border-radius': '50px',
                        'padding': '4px 1rem',
                        'display': 'inline-flex',
                        'align-items': 'baseline',
                    })


                console.log(searchLabel);
                filterWrapper.append(advanceSearch.removeClass('d-none'))
                $('#basic-datatable_wrapper').children().first().after(advanceSearchOptions);
                advanceSearch.click(e => {
                    e.preventDefault()
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-down')
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-up')
                    $('#advance-search-options').slideToggle()
                })
                $('#advance-search-close').click(e => {
                    e.preventDefault()
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-down')
                    advanceSearch.find('#chevron-icon').toggleClass('mdi-chevron-up')
                    $('#advance-search-options').slideToggle()
                })


            });
        </script>
    @endpush
@endsection
