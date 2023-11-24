@php
    $route = $attributes->get('method');
    $recentInvoices = App\Models\Invoice::with('client', 'currentFiscal')->latest()->limit(4)->get();
@endphp
<h4 class="p-2">Recently Updated Invoice</h4>
<div id="latest-container" class="d-none d-sm-flex flex-wrap justify-content-center gap-3 mb-5"
    style="overflow-x: hidden; overflow-y:hidden;">
    <a href="{{ $route }}" class="mb-2" style="width: clamp(160px, 190px, 220px);">
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