@include('backend.layouts.head')
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }
</style>


<div style="padding: 2rem 2.5rem;">
    <table style="width: 100%;">
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
                        <img src="{{ useImage($invoice->header_image) }}"
                            style="width:100%;height:25vw;object-fit:cover;">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;">
                            <span style="margin-right:1rem; ">Bill To:</span>
                            {{ str($invoice->client->name)->title() }}
                        </div>
                        <div style="font-weight: 500;">
                            <span
                                style="margin-right:1rem; ">Company:</span>{{ str($invoice->client->company_name)->title() }}
                        </div>
                        <div class="">
                            <p style="margin-bottom:0.2rem;font-weight:500; ">Address:</p>
                            {{ $invoice->client->present_address }}
                        </div>
                        <div class="">
                            {{ $invoice->client->phone }}
                        </div>
                    </div>
                </td>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <span style="margin-right:1rem; ">Issue
                                Date:</span>{{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->issue_date)->format('d F, Y') }}
                        </div>
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <span style="margin-right:1rem; ">Due
                                Date:</span>{{ Carbon\Carbon::parse($invoice->fiscalYears()->where('year', $year)->first()->pivot->due_date)->format('d F, Y') }}
                        </div>
                    </div>
                </td>
                <td>
                    <div style="margin-bottom:1.5rem;">
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <span style="margin-right:1rem; ">Invoice Number:</span>{{ $invoice->id }}
                        </div>
                        <div style="font-weight: 600;margin-bottom:.5rem;">
                            <span style="margin-right:1rem; ">Reference:</span>{{ $invoice->reference_no }}
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
                    </div>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <table style="width: 100%;">
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
                                        <div>{{ $invoiceItems->name }}</div>
                                        <div style="max-width: 30ch;">{{ $invoiceItems->description }}</div>
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
                                                                        {{ $tax->rate }}
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
                                        <div
                                            style="margin-right:0;border:1px solid gray; border-radius:10px; margin-bottom:1rem;">
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
                                            <div
                                                style="margin-right:0;border:1px solid gray; border-radius:10px; margin-bottom:1rem;">
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
                </td>
            </tr>
        </tbody>
    </table>
</div>
@include('backend.layouts.script')
