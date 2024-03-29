@include('backend.layouts.head')
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .d-block {
        display: block
    }

    .d-inline {
        display: inline;
    }

    .d-inline-block {
        display: inline-block;
    }

    .d-none {
        display: none;
    }

    .me-2 {
        margin-right: 0.4rem;
    }

    .me-0 {
        margin-right: 0;
    }

    .w-50 {
        width: 50%;
    }

    .w-100 {
        width: 100%;
    }

    @media (min-width: 992px) {
        .d-lg-block {
            display: block
        }

        .d-lg-inline {
            display: inline;
        }

        .d-lg-inline-block {
            display: inline-block;
        }

        .d-lg-none {
            display: none;
        }

        .me-lg-2 {
            margin-right: 0.4rem;
        }

        .me-lg-0 {
            margin-right: 0;
        }

        .w-lg-50 {
            width: 50% !important;
        }

        .w-lg-100 {
            width: 100% !important;
        }
    }

    /* @media (min-width: 768px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {} */
</style>


<div style="padding: 2rem 2.5rem;">
    <h1>Your Appoinment Successful </h1>
    {{-- <table style="width: 100%;">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4">
                    <div style="max-width: 1920px;margin-bottom:1.5rem;">
                        <img loading="lazy" src="{{ useImage($invoice->header_image) }}"
                            style="width:100%;height:25vw;object-fit:cover;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;margin-bottom:0.4rem;">
                            <div class="d-lg-inline" style="margin-right:1rem; ">Bill To:</div>
                            {{ str($invoice->client->name)->title() }}
                        </div>
                        <div style="font-weight: 500;margin-bottom:0.4rem;">
                            <div class="d-lg-inline" style="margin-right:1rem; ">Company:</div>
                            {{ str($invoice->client->company_name)->title() }}
                        </div>
                        <div class="">
                            <p style="margin-bottom:0.2rem;font-weight:500; ">Address:</p>
                            <div style="max-width: 15ch;">
                                {{ $invoice->client->present_address }}
                            </div>
                            <div class="">
                                {{ $invoice->client->phone }}
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <div class="d-lg-inline" style="margin-right:1rem; ">Issue
                                Date:</div>
                            {{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->issue_date)->format('d F, Y') }}
                        </div>
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <div class="d-lg-inline" style="margin-right:1rem; ">Due
                                Date:</div>
                            {{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->due_date)->format('d F, Y') }}
                        </div>
                    </div>
                </td>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <div class="d-lg-inline me-lg-2">Invoice No:</div>{{ $invoice->id }}
                        </div>
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <div class="d-lg-inline me-lg-2">Reference:</div>
                            {{ $invoice->reference_no }}
                        </div>
                    </div>
                </td>

                <td>
                    <div style="margin-bottom:1.5rem;">
                        <p style="font-weight: 500;text-align:end;margin-bottom:0.4;">Due Amount</p>
                        <h1 style="font-weight:800;margin-bottom:.5rem;text-align:end;">
                            {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->due }}
                            <span style="font-weight: 600;">Tk</span>
                        </h1>
                        <h4 style="font-weight: 600;margin-bottom:.5rem; text-align:end;">
                            <span style="margin-right:1rem; ">Year:</span>{{ $year }}
                        </h4>
                        @php
                            $color = 'dark';
                            switch (
                                $invoice
                                    ->fiscalYears()
                                    ->where('year', $year)
                                    ->first()->pivot->status
                            ) {
                                case 'sent':
                                    $color = '#1abc9c';
                                    break;
                                case 'paid':
                                    $color = '#1abc9c';
                                    break;
                                case 'due':
                                    $color = '#f7b84b';
                                    break;
                                case 'overdue':
                                    $color = '#f1556c';
                                    break;
                            
                                default:
                                    # code...
                                    break;
                            }
                        @endphp
                        <div style="font-weight: 600;margin-bottom:.5rem; text-align:end;">
                            <span style="margin-right:1rem; ">Status:</span>
                            <span
                                style="background: {{ $color }};padding:0.3rem 0.6rem; border-radius:0.3rem;color:white;">{{ str($invoice->fiscalYears()->where('year', $year)->first()->pivot->status)->title() }}</span>
                            </d>
                        </div>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <table style="width: 100%;text-align:center;">
                        <thead style="background: #eceff1;">
                            <tr>
                                <th style=" padding:.5rem 1rem;">No.</th>
                                <th style=" padding:.5rem 1rem;">Description</th>
                                <th style=" padding:.5rem 1rem;">Rate</th>
                                <th style=" padding:.5rem 1rem;">Qty</th>
                                <th style=" padding:.5rem 1rem;">Total</th>
                            </tr>
                        </thead>
                        <div>
                            @forelse ($invoice->invoiceItems as $key=>$invoiceItems)
                                <tr scope="row"
                                    @if ($key % 2 !== 0) style="background: #eceff1;" @endif>
                                    <td style=" padding:0.2rem 0.5rem;align-text:center;">
                                        {{ ++$key }}
                                    </td>
                                    <td style=" padding:0.2rem 0.5rem;align-text:center;">
                                        <div style="text-align: start;">
                                            <div style="max-widht:50ch;margin-right:auto;">
                                                <strong>{{ $invoiceItems->name }}</strong>
                                            </div>
                                            <div style="max-width: 30ch;color: rgb(138, 137, 137);">
                                                <lgall>{{ $invoiceItems->description }}</lgall>
                                            </div>
                                        </div>
                                    </td>
                                    <td style=" padding:0.2rem 0.5rem;align-text:center;">
                                        <div style="align-text:center;">{{ $invoiceItems->rate }}</div>
                                    </td>
                                    <td style=" padding:0.2rem 0.5rem;align-text:center;">
                                        <div style="align-text:center;">{{ $invoiceItems->qty }}</div>
                                    </td>
                                    <td style=" padding:0.2rem 0.5rem;align-text:center;">
                                        <div style="align-text:center;">{{ $invoiceItems->total }}</div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </div>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div style="display: table;width:100%;margin-top:1rem;">
                        <div style="display: table-row">
                            <div style="display: table-cell">
                                <div style="">
                                    <h4 style="text-decoration: underline;">Amount Details:</h4>
                                    <div class="">
                                        <div style="display: table;width:100%">
                                            <div style="font-weight: 600;display:table-row">
                                                <div style="margin-right: 1rem;display:table-cell">Sub Total:</div>
                                                <div style="display:table-cell;text-align:end;">
                                                    {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->sub_total }}
                                                    Tk</div>
                                                </h3>
                                            </div>
                                        </div>

                                        <div style="display: table;width:100%">
                                            <div style="font-weight: 600;display:table-row">
                                                <div style="margin-right: 1rem;display:table-cell">Discount:</div>
                                                <div style="display:table-cell;text-align:end;color:#1abc9c;">
                                                    -
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
                                                        <div style="">


                                                        </div>
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
                                        <div style="border:1px solid #c2c2c2; border-radius:5px;margin:.3rem 0 0.5rem;">
                                            <p style="max-width: 50ch; padding:0.4rem;margin:0;">
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


                                        <div class="" style="margin-bottom: 1rem;">
                                            <div class="w-100 w-lg-50" style="display: table;margin-bottom:0.4rem;">
                                                <div style="font-weight: 600;display:table-row">
                                                    <div style="display:table-cell;width:50%;">Demand</div>
                                                    <div style="display:table-cell;text-align:end;">:</div>
                                                    <div style="display:table-cell;text-align:end;">
                                                        {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->demand }}
                                                        Tk</div>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="w-100 w-lg-50" style="display: table;margin-bottom:0.4rem;">
                                                <div style="font-weight: 600;display:table-row">
                                                    <div style="display:table-cell;width:50%;">Paid</div>
                                                    <div style="display:table-cell;text-align:end;">:</div>
                                                    <div style="display:table-cell;text-align:end;color:#1abc9c;">
                                                        -
                                                        {{ $invoice->fiscalYears()->where('year', $year)->first()->pivot->paid }}
                                                        Tk</div>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="w-100 w-lg-50" style="display: table;margin-bottom:0.4rem;">
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
                                        @if ($invoice->payment_note)
                                            <div style="font-weight: 500;">
                                                Payment Note:
                                            </div>
                                            <div
                                                style="max-width: 50ch; padding:0.4rem;margin:0; border:1px solid #c2c2c2; border-radius:5px;">

                                                {{ $invoice->payment_note }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table> --}}
</div>
@include('backend.layouts.script')
