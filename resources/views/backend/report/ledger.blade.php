@extends('backend.layouts.app')


@push('customCss')
    <link rel="stylesheet" href="{{ asset('libs/nouislider/dist/nouislider.min.css') }}">
@endpush

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
    @php
        $pattern = '/\[.*\]/';
        // dd(preg_replace($pattern, '', request()->query('reference')));
    @endphp
    <x-backend.ui.breadcrumbs :list="['Management', 'Report', 'Ledger']" />

    <x-backend.ui.section-card name="Ledger">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
                class="mdi mdi-chevron-down fs-5"></span>
        </div>
        {{-- TODO: change advance search options here --}}
        <div id="advance-search-options" class="card rounded-3 d-none mt-2" style="border: 2px solid var(--ct-gray-500);">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <x-form.selectize class="mb-1 advance-filter-options" id="client" name="client"
                            placeholder="Select Client..." label="Client" :canCreate="false">
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" @selected(preg_replace($pattern, '', request()->query('client')) == $client->id)>{{ $client->name }}
                                </option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-form.selectize class="mb-1 advance-filter-options" id="reference" name="reference"
                            placeholder="Select Reference..." label="Reference" :canCreate="false">
                            @foreach ($references as $reference)
                                <option value="{{ $reference }}" @selected(preg_replace($pattern, '', request()->query('reference')) == $reference)>{{ $reference }}
                                </option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-backend.form.select-input class="advance-filter-options mb-2" label="Payment Stauts"
                            name="payment_status" placeholder="Payment Stauts">
                            @foreach (['draft', 'sent', 'partial', 'paid', 'due', 'overdue'] as $status)
                                <option value="{{ $status }}" @selected(preg_replace($pattern, '', request()->query('status')) == $status)>{{ str($status)->title() }}
                                </option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <x-backend.form.select-input class="advance-filter-options mb-2" name="fiscal_year" label="Year"
                            placeholder="Year">
                            @foreach (range(currentYear(), 2020) as $year)
                                <option value="{{ $year - 1 . '-' . $year }}" @selected($year === currentYear() || preg_replace($pattern, '', request()->query('fiscal_year')) == $year - 1 . '-' . $year)>
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
                                    label="Start Date" type="date" :value="preg_replace($pattern, '', request()->query('issue_date_from'))" />
                            </div>
                            <div class="col-sm-6">
                                <x-backend.form.text-input class="advance-filter-options mb-2" name="date_to"
                                    label="End Date" type="date" :value="preg_replace($pattern, '', request()->query('issue_date_to'))" />
                            </div>
                            <div class="col-sm-6">
                                <x-form.selectize class="advance-filter-options mb-2" id="circle" name="circle"
                                    label="Circle" placeholder="Select Circle" :canCreate="false">
                                    @foreach ($circles as $circle)
                                        <option value="{{ $circle }}" @selected(preg_replace($pattern, '', request()->query('circle')) == $circle)>
                                            {{ str($circle)->title() }}</option>
                                    @endforeach
                                </x-form.selectize>
                            </div>
                            <div class="col-sm-6">
                                <x-form.selectize class="advance-filter-options mb-2" id="zone" name="zone"
                                    label="Zone" placeholder="Select Zone" :canCreate="false">
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone }}" @selected(preg_replace($pattern, '', request()->query('zone')) == $zone)>
                                            {{ str($zone)->title() }}</option>
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
        </div>

        <div class="container">
            <h5 class="p-3">Ledger</h5>
            <table class="table border table-responsive">
                @php
                    $ledgerYear = App\Models\FiscalYear::where('year', $fiscalYear)->first();
                    $demandClient = $ledgerYear->invoices()->count();
                    $paidClient = $ledgerYear
                        ->invoices()
                        ->wherePivot('status', 'paid')
                        ->orWherePivot('status', 'partial')
                        ->count();
                    
                    $dueClient = $demandClient - $paidClient;
                @endphp
                <thead>
                    <tr>
                        <th class="border bg-soft-dark text-dark">Status</th>
                        <th class="border">Demand</th>
                        <th class="border">Paid</th>
                        <th class="border">Arear</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border bg-soft-dark text-dark">
                            Amount
                        </th>
                        <th class="border">
                            {{ $ledgerYear->invoices()->sum('demand') }}
                            <span class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                        </th>
                        <th class="border">
                            {{ $ledgerYear->invoices()->sum('paid') }}
                            <span class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                        </th>
                        <th class="border">
                            {{ $ledgerYear->invoices()->sum('due') }}
                            <span class="mdi mdi-currency-bdt font-16 fw-bold"></span>
                        </th>
                    </tr>
                    <tr>
                        <th class="border bg-soft-dark text-dark">Client</th>
                        <th class="border">
                            {{ $demandClient }}
                        </th>
                        <th class="border">
                            {{ $paidClient }}
                        </th>
                        <th class="border">
                            {{ $dueClient }}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <h5 class="card-header bg-soft-light text-dark">Ledger</h5>
            <div class="card-body">

                <x-backend.table.basic :data="$invoices">
                    <thead>
                        <tr>
                            <th>SL</th>
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
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $key => $invoice)
                            {{-- <div class="modal fade" id="send-email-modal-{{ $invoice->id }}" tabindex="-1"
                                role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="">Send Email</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('send_invoice_mail', $invoice->id) }}" method="post">
                                                @csrf
                                                <input type="text" name='year' value="{{ $fiscalYear }}" hidden>
                                                <div class="row align-items-center">
                                                    <div class="col-2">
                                                        <label for="email-to-{{ $invoice->id }}" class="form-label">To:
                                                        </label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control"
                                                            id="email-to-{{ $invoice->id }}"
                                                            placeholder="person@email.com" name="email_to" />

                                                    </div>
                                                    <div class="col-2">
                                                        <label for="email-subject-{{ $invoice->id }}"
                                                            class="form-label">Subject: </label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control mt-2"
                                                            id="email-subject-{{ $invoice->id }}"
                                                            placeholder="Subject for email" name="subject" />
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <div class="float-end">
                                                            <button type="button" class="btn btn-secondary">
                                                                Close</button>
                                                            <button type="submit" class="btn btn-primary">Send
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div> --}}
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
                                <td>
                                    <span
                                        class="fw-medium">{{ $invoice->fiscalYears()->where('year', $fiscalYear)->first()->pivot->demand . ' Tk' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="fw-medium">{{ $invoice->fiscalYears()->where('year', $fiscalYear)->first()->pivot->paid . ' Tk' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="fw-medium">{{ $invoice->fiscalYears()->where('year', $fiscalYear)->first()->pivot->due . ' Tk' }}</span>
                                </td>
                                {{-- <td>
                                    <div class="btn-group dropdown position-relative">
                                        <a href="javascript: void(0);"
                                            class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="bg-white py-2 px-3 position-absolute d-none rounded shadow"
                                            style="inset: 2rem 2rem auto auto!important; z-index:2;">
                                            <a class="dropdown-item d-flex align-items-center gap-2"
                                                href="{{ route('invoice.show', $invoice->id) . '?year=' . $fiscalYear }}"><span
                                                    class="mdi mdi-eye text-primary font-20"></span>View</a>
                                            <a class="dropdown-item d-flex align-items-center gap-2"
                                                href="{{ route('invoice.edit', $invoice->id) . '?year=' . $fiscalYear }}"><span
                                                    class="mdi mdi-file-edit text-info font-20"></span>Edit</a>

                                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2"
                                                data-bs-toggle="modal"
                                                data-bs-target="#send-email-modal-{{ $invoice->id }}"><span
                                                    class="mdi mdi-telegram text-warning font-20"></span>Send
                                                to...</button>
                                            <form action="{{ route('invoice.markAs', [$invoice->id, 'sent']) }}"
                                                method="POST">
                                                @csrf
                                                @method('patch')
                                                <input type="text" name="year" value="{{ currentFiscalYear() }}"
                                                    hidden>
                                                <button type="submit"
                                                    class="dropdown-item d-flex align-items-center gap-2"><span
                                                        class="mdi mdi-check text-success font-20"></span>Mark as
                                                    Sent</button>
                                            </form>
                                            <form action="{{ route('invoice.markAs', [$invoice->id, 'paid']) }}"
                                                method="POST">
                                                @csrf
                                                @method('patch')
                                                <input type="text" name="year" value="{{ currentFiscalYear() }}"
                                                    hidden>
                                                <button type="submit"
                                                    class="dropdown-item d-flex align-items-center gap-2"><span
                                                        class="mdi mdi-cash-check text-success font-20"></span>Mark as
                                                    Paid</button>
                                            </form>
                                            <form action="" method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="dropdown-item d-flex align-items-center gap-2"><span
                                                        class="mdi mdi-delete text-danger font-20"></span
                                                        class="text-danger">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </x-backend.table.basic>

            </div>
        </div>


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


                // console.log(searchLabel);
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

                $('.dropdown-toggle').click(function(e) {
                    $(e.target).parent().next().toggleClass('d-none')
                })


                const elements = $('.advance-filter-options')
                const applyBtn = $('#apply-btn')
                let url = "{{ route('invoice.filter') }}" + '?'
                // filter options
                const filter = {
                    url: url + "{{ request()->query('fiscal_year') }}" ?
                        "fiscal_year={{ request()->query('fiscal_year') }}" :
                        'fiscal_year=[eq]{{ currentFiscalYear() }}',
                    data: null,
                    queries: {
                        year: "{{ request()->query('fiscal_year') }}" ?
                            "fiscal_year={{ request()->query('fiscal_year') }}" :
                            'fiscal_year=[eq]{{ currentFiscalYear() }}',
                        client: "{{ request()->query('client') }}" ? "&client={{ request()->query('client') }}" :
                            '',
                        reference: "{{ request()->query('reference') }}" ?
                            "&reference={{ request()->query('reference') }}" : '',
                        status: "{{ request()->query('status') }}" ? "&status={{ request()->query('status') }}" :
                            '',
                        demandPriceFrom: '',
                        paidPriceFrom: '',
                        duePriceFrom: '',
                        demandPriceTo: '',
                        paidPriceTo: '',
                        duePriceTo: '',
                        issueDateFrom: "{{ request()->query('issue_date_from') }}" ?
                            "&issue_date_from={{ request()->query('issue_date_from') }}" : '',
                        dueDateFrom: '',
                        issueDateTo: "{{ request()->query('issue_date_to') }}" ?
                            "&issue_date_to={{ request()->query('issue_date_to') }}" : '',
                        dueDateTo: '',
                        circle: "{{ request()->query('circle') }}" ? "&circle={{ request()->query('circle') }}" :
                            '',
                        zone: "{{ request()->query('zone') }}" ? "&zone={{ request()->query('zone') }}" : '',
                    },

                    updateUrl(jqElement) {
                        jqElement.on('change', (e) => {
                            switch (e.target.name) {
                                case 'fiscal_year':
                                    this.queries.year = e.target.value !== '' ?
                                        `fiscal_year=[eq]` + e.target.value : ''
                                    break;
                                case 'client':
                                    this.queries.client = e.target.value !== '' ?
                                        `&client=[eq]` + e.target.value : ''
                                    break;
                                case 'reference':
                                    this.queries.reference = e.target.value !== '' ?
                                        `&reference=[eq]` + e.target.value : ''
                                    break;
                                case 'payment_status':
                                    this.queries.status = e.target.value !== '' ?
                                        `&status=[eq]` + e.target.value : ''
                                    break;
                                case 'demand_from':
                                    this.queries.demandPriceFrom = e.target.value !== '' ?
                                        `&demand=[gte]` + e.target.value : ''
                                    break;
                                case 'paid_from':
                                    this.queries.paidPriceFrom = e.target.value !== '' ?
                                        `&paid=[gte]` + e.target.value : ''
                                    break;
                                case 'arear_from':
                                    this.queries.duePriceFrom = e.target.value !== '' ?
                                        `&arear=[gte]` + e.target.value : ''
                                    break;
                                case 'demand_to':
                                    this.queries.demandPriceTo = e.target.value !== '' ?
                                        `&demand=[lte]` + e.target.value : ''
                                    break;
                                case 'paid_to':
                                    this.queries.paidPriceTo = e.target.value !== '' ?
                                        `&paid=[lte]` + e.target.value : ''
                                    break;
                                case 'arear_to':
                                    this.queries.duePriceTo = e.target.value !== '' ?
                                        `&arear=[lte]` + e.target.value : ''
                                    break;
                                case 'date_from':
                                    this.queries.issueDateFrom = e.target.value !== '' ?
                                        `&issue_date_from=[gte]` + e.target.value : ''
                                    break;
                                case 'date_to':
                                    this.queries.issueDateTo = e.target.value !== '' ?
                                        `&issue_date_to=[lte]` + e.target.value : ''
                                    break;
                                case 'zone':
                                    this.queries.zone = e.target.value !== '' ?
                                        `&zone=[eq]` + e.target.value : ''
                                    break;
                                case 'circle':
                                    this.queries.circle = e.target.value !== '' ?
                                        `&circle=[eq]` + e.target.value : ''
                                    break;

                                default:
                                    break;
                            }
                            this.url = url +
                                this.queries.year +
                                this.queries.client +
                                this.queries.reference +
                                this.queries.status +
                                this.queries.demandPriceFrom +
                                this.queries.paidPriceFrom +
                                this.queries.duePriceFrom +
                                this.queries.demandPriceTo +
                                this.queries.paidPriceTo +
                                this.queries.duePriceTo +
                                this.queries.issueDateFrom +
                                this.queries.issueDateTo +
                                this.queries.dueDateFrom +
                                this.queries.dueDateTo +
                                this.queries.circle +
                                this.queries.zone
                        })
                    },
                }
                // add eventlisteners to every filter input element
                elements.each((i, element) => {
                    let jqEl = $(element)
                    filter.updateUrl(jqEl)
                });

                applyBtn.click(e => {
                    location.assign(filter.url)
                })

                // add any existing queries to the default url
                filter.url = url +
                    filter.queries.year +
                    filter.queries.client +
                    filter.queries.reference +
                    filter.queries.status +
                    filter.queries.demandPriceFrom +
                    filter.queries.paidPriceFrom +
                    filter.queries.duePriceFrom +
                    filter.queries.demandPriceTo +
                    filter.queries.paidPriceTo +
                    filter.queries.duePriceTo +
                    filter.queries.issueDateFrom +
                    filter.queries.issueDateTo +
                    filter.queries.dueDateFrom +
                    filter.queries.dueDateTo +
                    filter.queries.circle +
                    filter.queries.zone
            });
        </script>
    @endpush
@endsection
