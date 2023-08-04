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
        {{-- TODO: change advance search options here --}}
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
                            <form action="" method="post">
                                @csrf
                                <x-backend.form.text-input name="start_date" label="Start Date" type="date" />
                                <x-backend.form.text-input name="end_date" label="End Date" type="date" />
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <form action="" method="post">
                                @csrf
                                <x-backend.form.select-input name="circle" label="Circle" placeholder="Select Circle">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->cricle }}</option>
                                    @endforeach
                                </x-backend.form.select-input>
                                <x-backend.form.select-input name="zone" label="Zone" placeholder="Select Zone">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->zone }}</option>
                                    @endforeach
                                </x-backend.form.select-input>
                            </form>
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
                            <div class="modal fade" id="send-email-modal-{{ $invoice->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
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
                                {{-- <td>
                                    <x-backend.ui.button type="custom" href="{{ route('invoice.show', $invoice->id) }}"
                                        class="btn-sm btn-dark">
                                        View</x-backend.ui.button>
                                        <x-backend.ui.button type="custom" href="{{ route('invoice.edit', $invoice->id) }}"
                                            class="btn-sm btn-dark">
                                        Edit</x-backend.ui.button>
                                    <x-backend.ui.button type="delete"
                                        action="{{ route('invoice.destroy', $invoice->id) }}" class="btn-sm" />
                                </td> --}}
                                <td>
                                    <div class="btn-group dropdown position-relative">
                                        <a href="javascript: void(0);"
                                            class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-xs"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="bg-white py-2 px-3 position-absolute d-none rounded shadow"
                                            style="inset: 2rem 2rem auto auto!important; z-index:2;">
                                            <a class="dropdown-item d-flex align-items-center gap-2"
                                                href="{{ route('invoice.show', $invoice->id) . '?year=' . $year }}"><span
                                                    class="mdi mdi-eye text-primary font-20"></span>View</a>
                                            <a class="dropdown-item d-flex align-items-center gap-2" href="#"><span
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
                console.log(containerHeight);
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

                $('.dropdown-toggle').click(function(e) {
                    $(e.target).parent().next().toggleClass('d-none')
                })


            });
        </script>
    @endpush
@endsection
