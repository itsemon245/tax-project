@extends('backend.layouts.app')


@push('customCss')
    <link rel="stylesheet" href="{{ asset('libs/nouislider/dist/nouislider.min.css') }}">
@endpush

@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Invoice', 'List']" />

    <x-backend.ui.section-card name="Invoices">

        <div id="advance-search" class="d-inline-block d-none"
            style="border-radius:50px; border: 2px solid var(--ct-gray-500);padding:3.5px 8px;" role="button">
            <span class="mdi mdi-filter-variant fs-5"></span> Advanced Search <span id="chevron-icon"
                class="mdi mdi-chevron-down fs-5"></span>
        </div>
        {{-- TODO: change advance search options here --}}
        <div id="advance-search-options" class="card rounded-3 d-none mt-2" style="border: 2px solid var(--ct-gray-500);">
            <form action="#">
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
                            <x-backend.form.select-input class="advance-filter-options mb-2" name="fiscal_year"
                                label="Year" placeholder="Year">
                                @foreach (range(currentYear(), 2020) as $year)
                                    <option value="{{ $year - 1 . '-' . $year }}" @selected($year === currentYear())>
                                        {{ str($year - 1 . '-' . $year)->title() }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-lg-6">
                            <x-range-slider class="advance-filter-options" name="price" id="price" from="100"
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
                                <x-backend.ui.button type="button" id="advance-search-close"
                                    class="btn-sm btn-outline-dark">
                                    Close
                                </x-backend.ui.button>
                                <x-backend.ui.button id="apply-btn" type="button"
                                    class="btn-sm btn-primary">Apply</x-backend.ui.button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <h5 class="p-3">Recently Updated</h5>
        <div id="latest-container" class="d-none d-sm-flex flex-wrap justify-content-center gap-3 mb-5"
            style="overflow-x: hidden; overflow-y:hidden;">
            <a href="{{ route('invoice.create') }}" class="mb-2" style="width: clamp(160px, 190px, 220px);">
                <div class="card h-100 shadow" style="border: medium dashed var(--ct-gray-400);">
                    <div class="card-body h-100">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <span class="text-success fw-bold display-5">+</span>
                            <span class="fw-bold text-muted fs-4">New Invoice</span>
                        </div>
                    </div>
                </div>
            </a>
            @foreach ($recentInvoices as $invoice)
                @php
                    $color = 'dark';
                    switch ($invoice->currentFiscal[0]->pivot->status) {
                        case 'sent':
                            $color = 'success';
                            break;
                        case 'paid':
                            $color = 'success';
                            break;
                        case 'due':
                            $color = 'warning';
                            break;
                        case 'overdue':
                            $color = 'danger';
                            break;
                    
                        default:
                            # code...
                            break;
                    }
                @endphp
                <div class="latest-items mb-2" style="width: clamp(160px, 190px, 220px);">
                    <div class="card h-100 shadow border-top">
                        <div class="card-body">
                            <h5>ID:{{ $invoice->id }}</h5>
                            <h5>{{ str($invoice->client->name)->title() }} <br> <span
                                    class="text-muted fw-normal fs-6">Company:
                                    {{ str($invoice->client->company_name)->title() }}</span></h5>
                            <p class='text-muted mb-0'>Issued:
                                {{ Carbon\Carbon::parse($invoice->currentFiscal()->first()->pivot->issue_date)->format('d F, Y') }}
                            </p>
                            <p class='text-muted mb-0'>Due:
                                {{ Carbon\Carbon::parse($invoice->currentFiscal()->first()->pivot->due_date)->format('d F, Y') }}
                            </p>
                        </div>
                        <div
                            class="bg-soft-{{ $color }} text-{{ $color }} w-100 p-1 text-center fw-bold rounded-bottom">
                            {{ str($invoice->currentFiscal()->first()->pivot->status)->title() }}
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
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $key => $invoice)
                            <!-- Center modal content -->
                            <div class="modal fade" id="send-email-modal-{{ $invoice->id }}" tabindex="-1"
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
                                                            placeholder="Subject for email" name="email_subject" />
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
                            </div><!-- /.modal -->
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
                                    <span class="fw-medium">{{ $invoice->fiscalYears[0]->pivot->demand . ' Tk' }}</span>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $invoice->fiscalYears[0]->pivot->paid . ' Tk' }}</span>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $invoice->fiscalYears[0]->pivot->due . ' Tk' }}</span>
                                </td>
                                <td>
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
                                </td>
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
                let containerHeight = parseInt($('.latest-items').css('height').split('px')[0]) + 4
                // console.log(containerHeight);
                $('#latest-container').css('height', containerHeight)

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
                    queries: {
                        client: '',
                        reference: '',
                        status: '',
                        year: "year=" + '{{ currentFiscalYear() }}',
                        priceFrom: '',
                        priceTo: '',
                        dateFrom: '',
                        dateTo: '',
                        circle: '',
                        zone: '',
                    },
                    url: '',

                    updateUrl(jqElement) {
                        // console.log(jqElement);
                        jqElement.on('change', (e) => {
                            switch (e.target.name) {
                                case 'fiscal_year':
                                    this.queries.year = `fiscal_year=` + e.target.value
                                    break;
                                case 'client':
                                    this.queries.client = `&client=` + e.target.value
                                    break;
                                case 'reference':
                                    this.queries.reference = `&reference=` + e.target.value
                                    break
                                case 'payment_status':
                                    this.queries.status = `&status=` + e.target.value
                                    break;
                                case 'price_from':
                                    this.queries.priceFrom = `&price_from=` + e.target.value
                                    break;
                                case 'price_to':
                                    this.queries.priceTo = `&price_to=` + e.target.value
                                    break;
                                case 'date_from':
                                    this.queries.dateFrom = `&date_from=` + e.target.value
                                    break;
                                case 'date_to':
                                    this.queries.dateTo = `&date_to=` + e.target.value
                                    break;
                                case 'zone':
                                    this.queries.zone = `&zone=` + e.target.value
                                    break;
                                case 'circle':
                                    this.queries.circle = `&circle=` + e.target.value
                                    break;

                                default:
                                    break;
                            }
                            this.url = url +
                                this.queries.year +
                                this.queries.client +
                                this.queries.reference +
                                this.queries.status +
                                this.queries.priceFrom +
                                this.queries.priceTo +
                                this.queries.dateFrom +
                                this.queries.dateTo +
                                this.queries.circle +
                                this.queries.zone
                        })
                    },
                    fetchData(url) {
                        $.ajax({
                            type: "get",
                            url: url,
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    },
                    updateDom(data) {

                    },

                }
                // add eventlisteners to every filter input element
                elements.each((i, element) => {
                    let jqEl = $(element)
                    filter.updateUrl(jqEl)
                });

                applyBtn.click(function(e) {
                    e.preventDefault()
                    filter.fetchData(filter.url)
                })


            });
        </script>
    @endpush
@endsection
