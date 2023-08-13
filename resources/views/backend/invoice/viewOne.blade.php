@extends('backend.layouts.app')

@pushOnce('customCss')
    <style>
        input[type="date"] {
            letter-spacing: 2px;
            border: none;
            padding: 0.2rem 0.1rem;
        }

        input[type="date"]:focus {
            border-radius: 5px;
        }

        input[type="date"]:hover {
            cursor: pointer;
        }

        input {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        textarea {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        .tax-wrapper {
            position: relative;
        }

        .tax-container {
            position: absolute;
            background: var(--ct-white);
            width: 320px;
            border-radius: 10px;
            border: 2px solid var(--ct-gray-300);
            overflow: visible;
            top: -20px;
            left: 60px;
        }

        .tax-container>.title {
            background: var(--ct-light);
            margin: 0 0 .5rem;
            padding: .5rem;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .tax-container>.title::before {
            content: '';

            border-top: .5rem solid transparent;
            border-right: 1rem solid var(--ct-gray-300);
            border-bottom: .5rem solid transparent;
            bottom: 0;
            left: -1rem;
            position: absolute;
        }

        .tax-container .close-icon {
            top: -.5rem;
            right: -.7rem;
            position: absolute;
            z-index: 2;
        }

        .discount-wrapper {
            position: relative;
        }

        .discount-container {
            position: absolute;
            background: var(--ct-white);
            width: 200px;
            border-radius: 10px;
            border: 2px solid var(--ct-gray-300);
            overflow: visible;
            top: -20px;
            left: 60px;
        }

        .discount-container>.title {
            background: var(--ct-light);
            margin: 0 0 .5rem;
            padding: .5rem;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .discount-container>.title::before {
            content: '';

            border-top: .5rem solid transparent;
            border-right: 1rem solid var(--ct-gray-300);
            border-bottom: .5rem solid transparent;
            bottom: 0;
            left: -1rem;
            position: absolute;
        }

        @media print {
            .table-col: {
                display: table-column;
                width: 100%;
            }

            .table-cell {
                display: table-column;
                width: 25%;
            }
        }
    </style>
@endPushOnce

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'View']" />
    <!-- end page title -->


    <x-backend.ui.section-card>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary waves-effect waves-light m-2 d-print-none d-block" id="cmd">Print</button>
        </div>
        <div>
            <div class="d-flex border mb-5 justify-content-center">
                <img class="w-100" src="{{ useImage($invoice->header_image) }}" style="aspect-ratio:4/1;object-fit:cover;">
            </div>
            <div class="row table-col">
                <div class="col-sm-4 col-md-3 table-cell">
                    <div class="pe-2 mb-2">
                        <div class="fw-bold">
                            {{ $invoice->client->name }}
                        </div>
                        <div class="fw-bold">
                            {{ str($invoice->client->company_name)->title() }}
                        </div>
                        <div class="">
                            {{ $invoice->client->present_address }}
                        </div>
                        <div class="">
                            {{ $invoice->client->phone }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 table-cell">
                    <div class="mb-3">
                        <label for="issue-date" class="mb-0 d-block">Date of Issue</label>
                        <div class="d-flex align-items-center">
                            <input type="date" name="issue_date" id="issue-date"
                                value="{{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->issue_date)->format('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="issue-date" class="mb-0 d-block">Due Date</label>
                        <div class="d-flex align-items-center">
                            <input type="date" name="due_date" id="due-date"
                                value="{{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->due_date)->format('Y-m-d') }}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 table-cell">
                    <div class="mb-3">
                        <p class="mb-0 form-label">Invoice Number</p>
                        <span class="text-black" id="invoice-id">{{ $invoice->id ?? '' }}</span>
                    </div>
                    <div>
                        <label class="mb-0" for="reference">Reference</label>
                        <input type="text" id="reference" name="reference" value="{{ $invoice->reference_no ?? '' }}">
                    </div>

                </div>
                <div class="col-sm-12 col-md-3 table-cell">
                    <div class="d-flex justify-content-end mb-2">
                        <p class="mb-0">Amount Due (USD) <br>
                            <span class="fs-1 fw-bold text-black"
                                id="amount-due-vue">{{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->due ?? '' }}Tk</span>
                        </p>
                    </div>
                    <div class="fw-bold d-flex justify-content-end">
                        <h4> Year: {{ $year }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <table class="w-100 mb-3">
            <thead class="" style="background: rgb(238, 236, 236)">
                <tr>
                    <th class="p-1">#</th>
                    <th class="p-1">Description</th>
                    <th class="p-1">Rate</th>
                    <th class="p-1">Qty</th>
                    <th class="p-1">Total</th>
                </tr>
            </thead>
            <div id="table-body">
                @forelse ($invoice->invoiceItems as $key=>$invoiceItems)
                    <tr scope="row">
                        <td class="p-1">
                            {{ ++$key }}
                        </td>
                        <td class="p-1">
                            <input value="{{ $invoiceItems->name ?? 'No Name' }}" disabled />
                            <input value="{{ $invoiceItems->description ?? 'No Description' }}" disabled />
                        </td>
                        <td class="p-1">
                            <input value="{{ $invoiceItems->rate ?? 'No Rate' }}" disabled />
                        </td>
                        <td class="p-1">
                            <input value="{{ $invoiceItems->qty ?? 'No Qty' }}" disabled />
                        </td>
                        <td class="p-1">
                            <input value="{{ $invoiceItems->total ?? 'No Total' }}" disabled />
                        </td>
                    </tr>
                @empty
                @endforelse

            </div>
        </table>

        <div style="display: table;width:100%;">
            <div style="display: table-row">
                <div style="display: table-cell">
                    <div style="">
                        <h4 style="text-decoration: underline;">Amount Details:</h4>
                        <div class="">
                            <div style="display: table;width:100%">
                                <div style="font-weight: 600;display:table-row">
                                    <div style="margin-right: 1rem;display:table-cell">Sub Total:
                                    </div>
                                    <div style="display:table-cell;text-align:end;">
                                        {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->sub_total }}
                                        Tk</div>
                                    </h3>
                                </div>
                            </div>

                            <div style="display: table;width:100%">
                                <div style="font-weight: 600;display:table-row">
                                    <div style="margin-right: 1rem;display:table-cell">Discount:
                                    </div>
                                    <div style="display:table-cell;text-align:end;color:#1abc9c;">
                                        {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->discount }}
                                        Tk</div>
                                    </h3>
                                </div>
                            </div>

                            <div style="font-weight: 500;">
                                <h5 style="margin:0.2rem 1rem 0 0">Taxes:</h5>
                                <div style="border-bottom: 2px solid gray;padding-bottom:1rem;">
                                    @forelse ($invoice->invoiceItems as $item)
                                        @foreach (json_decode($item->taxes) as $tax)
                                            <div style="display: table;width:100%">
                                                <div style="font-weight: 600;display:table-row">
                                                    <div style="margin-right: 1rem;display:table-cell">
                                                        <div>{{ str($tax->name)->title() }}<span
                                                                style="font-weight: 300; margin-left:0.4rem;">(#{{ $tax->number }})</span>
                                                        </div>
                                                    </div>
                                                    <div style="display:table-cell;text-align:end;">
                                                        <span style="color: #f1556c;">
                                                            +
                                                            {{ ($tax->rate / 100) * $item->total }}
                                                            Tk</span>
                                                    </div>
                                                    </h3>
                                                </div>
                                            </div>
                                        @endforeach

                                    @empty
                                        <div>No taxes Added</div>
                                    @endforelse
                                </div>
                            </div>

                            <div style="display: table;width:100%">
                                <div style="font-weight: 600;display:table-row">
                                    <div style="margin-right: 1rem;display:table-cell">Total:</div>
                                    <div style="display:table-cell;text-align:end;">
                                        {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->demand }}
                                        Tk</div>
                                    </h3>
                                </div>
                            </div>

                        </div>
                        @if ($invoice->note)
                            <div style="font-weight: 500;margin-top:1rem;">
                                Note:
                            </div>
                            <div style="margin-right:0;border:1px solid gray; border-radius:10px; margin-bottom:1rem;">
                                <p style="max-width: 50ch; padding:1rem;">
                                    {{ $invoice->note }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <div style="display:table-cell; padding:2rem;"></div>

                <div style="display: table-cell">
                    <div>
                        <h4 style="text-decoration: underline;">Payment Details:</h4>
                        <div class="">
                            <div style="font-weight: 600; margin-bottom:.5rem;">
                                <span style="margin-right: 1rem;">Payment Method:</span>
                                <span>{{ str($invoice->payment_method)->title() }}</span>
                                </h3>
                            </div>
                            @if ($invoice->payment_note)
                                <div style="font-weight: 500;">
                                    Payment Note:
                                </div>
                                <div style="margin-right:0;border:1px solid gray; border-radius:10px; margin-bottom:1rem;">
                                    <p style="max-width: 50ch; padding:1rem;">
                                        {{ $invoice->payment_note }}
                                    </p>
                                </div>
                            @endif

                            <div class="">
                                <div style="display: table;width:50%">
                                    <div style="font-weight: 600;display:table-row">
                                        <div style="display:table-cell;width:50%;">Demand</div>
                                        <div style="display:table-cell;text-align:end;">:</div>
                                        <div style="display:table-cell;text-align:end;">
                                            {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->demand }}
                                            Tk</div>
                                        </h3>
                                    </div>
                                </div>
                                <div style="display: table;width:50%">
                                    <div style="font-weight: 600;display:table-row">
                                        <div style="display:table-cell;width:50%;">Paid</div>
                                        <div style="display:table-cell;text-align:end;">:</div>
                                        <div style="display:table-cell;text-align:end;color:#1abc9c;">
                                            -{{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->paid }}
                                            Tk</div>
                                        </h3>
                                    </div>
                                </div>
                                <div style="display: table;width:50%">
                                    <div style="font-weight: 600;display:table-row">
                                        <div style="display:table-cell;width:50%;">Due</div>
                                        <div style="display:table-cell;text-align:end;">:</div>
                                        <div style="display:table-cell;text-align:end;">
                                            {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->due }}
                                            Tk</div>
                                        </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </x-backend.ui.section-card>


    @push('customJs')
        <script>
            $('#cmd').on('click', function() {
                window.print()
            })
        </script>
    @endpush
@endsection
