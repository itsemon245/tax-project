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
    </style>
@endPushOnce

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'View']" />
    <!-- end page title -->

    <div id="pdfViewer">
        <x-backend.ui.section-card>
            <section class="p-lg-3">

                <div>
                    <img src="" alt="">
                    <div class="d-flex border mb-5 justify-content-center">
                        <x-backend.form.image-input name="header_image" :image="$invoiceImage"
                            class="d-flex justify-content-center" style="aspect-ratio:4/1;object-fit:contain;" />
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
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
                        <div class="col-sm-4 col-md-3">
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
                        <div class="col-sm-4 col-md-3">
                            <div class="mb-3">
                                <p class="mb-0 form-label">Invoice Number</p>
                                <span class="text-black" id="invoice-id">{{ $invoice->id ?? '' }}</span>
                            </div>
                            <div>
                                <label class="mb-0" for="reference">Reference</label>
                                <input type="text" id="reference" name="reference"
                                    value="{{ $invoice->reference_no ?? '' }}">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-3">
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

                <div id="invoice-view-app">
                    <div id="invoice-view-app">
                        <div class="border-top border-4 mt-5">
                            <div class="table-responsive mb-3">
                                <table class="table table-striped">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <div id="table-body">
                                        @forelse ($invoice->invoiceItems as $key=>$invoiceItems)
                                            <tr scope="row">
                                                <td>
                                                    {{ ++$key }}
                                                </td>
                                                <td>
                                                    <input value="{{ $invoiceItems->name ?? 'No Name' }}" disabled />
                                                    <input value="{{ $invoiceItems->description ?? 'No Description' }}"
                                                        disabled />
                                                </td>
                                                <td>
                                                    <input value="{{ $invoiceItems->rate ?? 'No Rate' }}" disabled />
                                                </td>
                                                <td>
                                                    <input value="{{ $invoiceItems->qty ?? 'No Qty' }}" disabled />
                                                </td>
                                                <td>
                                                    <input value="{{ $invoiceItems->total ?? 'No Total' }}" disabled />
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse

                                    </div>
                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-5">
                                <h4 class="">Amount Details:</h4>
                                <div class="row align-items-center justify-content-between">
                                    <label class="col-4 form-label mb-0">Sub Total:</label>
                                    <div class="col-5 p-0"><input type="text" class="text-end p-1 d-inline-block fw-bold"
                                            name="sub_total" placeholder="00.00" style="width: calc(100% - 1rem);"
                                            value={{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->sub_total ?? '' }}><span
                                            class="">Tk</span></div>

                                    <label class="col-4 form-label mb-0">Discount</label>
                                    <div class="col-5 p-0"><input type="text" class="text-end p-1 d-inline-block fw-bold"
                                            name="sub_total" placeholder="00.00" style="width: calc(100% - 1rem);"
                                            value={{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->discount ?? '' }}><span
                                            class="">Tk</span></div>
                                </div>

                                <div class="mb-2">
                                    <div class="row mb-1 align-items-center justify-content-between">
                                        <p class="col-8 mb-0">
                                        <div class=""> Taxes: <div class="d-flex gap-1 flex-wrap">
                                                <div>
                                                    <div style="display: none;">(<span class="fs-6 fw-light p-0">#</span>),
                                                    </div>
                                                </div>
                                                <div>No taxes Added</div>
                                            </div>
                                        </div>
                                        </p><span class="col-4 text-end p-0 text-danger fw-bold" style="display: none;">+ 0
                                            Tk</span>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center justify-content-between border-top border-2"><label
                                        class="col-4 form-label mb-0">Total</label><input type="text"
                                        class="col-6 text-end p-1" name="total" placeholder="00.00"
                                        value={{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->demand }}>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <h4 class="">Payment Details:</h4>
                                <div class="d-flex my-1 gap-2 align-items-center mb-2"><select name="payment_method"
                                        class="form-select text-capitalize w-50">
                                        <option value="cash">{{ $invoice->payment_method }}</option>
                                    </select></div>
                                <div class="mb-2">
                                    @if ($invoice->payment_note)
                                        <label class="mb-0" for="note">Payment Note</label>
                                        <textarea class="border border-2 w-100" name="payment_note"
                                            placeholder="Write a payment note...
                                            e.g: Card Details, Bank Details etc"
                                            rows="4" data-gramm="false" wt-ignore-input="true">{{ $invoice->payment_note ?? '' }}</textarea>
                                    @else
                                    @endif

                                </div>
                                <div class="row mb-2 align-items-center"><label
                                        class="col-4 form-label mb-0">Total</label><input type="text"
                                        class="col-6 p-1" name="total" placeholder="00.00"
                                        value="{{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->demand }}">
                                </div>
                                <div class="row mb-2 align-items-center"><label class="col-4 form-label mb-0">Amount
                                        Paid</label><input type="text" class="col-6 p-1" name="paid"
                                        placeholder="00.00"
                                        value="{{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->paid }}">
                                </div>
                                <div class="row mb-2 align-items-center"><label class="col-4 form-label mb-0">Amount Due
                                    </label><input type="text" class="col-6 p-1" name="due" placeholder="00.00"
                                        value="{{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->due }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </x-backend.ui.section-card>
    </div>

    <button class="btn btn-primary waves-effect waves-light mt-2" id="cmd">Print</button>

    @push('customJs')
        <script src="{{ asset('backend/assets/js/printThis.js') }}"></script>
        <script>
            $('#cmd').on('click', function() {
                $('#pdfViewer').printThis()
            })
        </script>
    @endpush
@endsection
