<?php

namespace App\Http\Controllers\Backend\Invoice;

use Throwable;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Calendar;
use App\Mail\InvoiceMail;
use App\Models\FiscalYear;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\Filter\InvoiceFilter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\InvoiceResource;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceItemCollection;
use App\Models\Expense;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:read invoice', [
            'only' => ['index', 'show']
        ]);
        $this->middleware('can:create invoice',   [
            'only' => ['create', 'store']
        ]);
        $this->middleware('can:update invoice',   [
            'only' => ['update', 'edit']
        ]);
        $this->middleware('can:delete invoice',  [
            'only' => ['destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fiscalYear = currentFiscalYear();
        $invoices = Invoice::with('client', 'currentFiscal', 'recentFiscalYears')->latest()
        ->whereHas('fiscalYears', function($q){
            $q->where('year', currentFiscalYear());
        })
        ->latest()->paginate(paginateCount());
        $references = Invoice::select('reference_no')->distinct()->latest()->get()->pluck('reference_no');
        $zones = Client::select('zone')->distinct()->latest()->get()->pluck('zone');
        $circles = Client::select('circle')->distinct()->latest()->get()->pluck('circle');
        $clients = Client::latest()->latest()->get();
        return view('backend.invoice.viewAll', compact( 'invoices', 'clients', 'references', 'zones', 'circles', 'fiscalYear'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        $invoiceImage = null;
        if (countRecords('invoices') > 0) {
            $invoiceImage = Invoice::first()->header_image;
            // dd($invoiceImage);
        }
        return view('backend.invoice.createInvoice', compact('clients', 'invoiceImage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        $fiscalYear = FiscalYear::where('year', $request->year)->first();
        $fiscalYear = $fiscalYear === null ? FiscalYear::create(['year' => $request->year]) : $fiscalYear;
        // dd($fiscalYear);
        // if ($request->hasFile('header_image')) {
        //     $header_image = saveImage($request->image, 'invoices', 'invoice');
        // } else {
        //     $header_image = Invoice::first()->header_image;
        // }
        $invoice = Invoice::create([
            'client_id' => $request->client,
            'reference_no' => $request->reference,
            'note' => $request->note,
            'payment_note' => $request->payment_note,
            'payment_method' => $request->payment_method,
        ]);
        $demand = (int) $request->total;
        $paid = (int) $request->paid;
        $due = (int) $request->due;
        $status = $due === 0 ? 'due' : '';
        $status = $paid > 0 && $paid === $demand ? 'paid' : 'partial';

        $invoice->fiscalYears()->attach($fiscalYear->id, [
            'discount' => $request->discount,
            'sub_total' => $request->sub_total,
            'demand' => $demand,
            'paid' => $paid,
            'due' => $due,
            'status' => $status,
            'payment_date' => $due == 0 ? today('Asia/Dhaka') : null,
            'due_date' => $request->due_date,
            'issue_date' => $request->issue_date,
        ]);
        Calendar::create([
            'title' => 'Invoice ' . $status,
            'client_id' => $invoice->client_id,
            'service' => 'Invoice',
            'type' => 'Invoice ' . $status,
            'start' => today('Asia/Dhaka'),
            'description' => null
        ]);


        //invoice Items
        foreach ($request->item_names as $key => $name) {
            // taxes
            $taxes = [];
            if ($request["tax-$key-rates"] !== null) {
                foreach ($request["tax-$key-rates"] as $id => $name) {
                    $array = [
                        'name' => $request["tax-$key-names"][$id],
                        'rate' => $request["tax-$key-rates"][$id],
                        'number' => $request["tax-$key-numbers"][$id],
                    ];
                    array_push($taxes, $array);
                }
            }

            $item = [
                'invoice_id' => $invoice->id,
                'name' => $request['item_names'][$key],
                'description' => $request['item_descriptions'][$key],
                'rate' => $request['item_rates'][$key],
                'qty' => $request['item_qtys'][$key],
                'total' => $request['item_rates'][$key] * $request['item_qtys'][$key],
                'taxes' => json_encode($taxes),
            ];
            $invoiceItem = InvoiceItem::create($item);
        }
        $alert = [
            'message' => "Invoice Created Successfully",
            'alert-type' => 'success',
        ];
        if ($request->has('print')) {
            return redirect(route('invoice.show', $invoice))->with('print', true);
        }

        return back()->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Invoice $invoice)
    {
        $year = $request->year ? $request->year : currentFiscalYear();
        $fiscalYear = FiscalYear::where('year', $year)->first();
        $invoice = $fiscalYear->invoices()->find($invoice->id);
        return view('backend.invoice.viewOne', compact('invoice', 'year'));
    }

    function getInvoiceData(Request $request, $id)
    {
        $year = $request->year ? $request->year : currentFiscalYear();
        $fiscalYear = FiscalYear::where('year', $year)->first();
        $invoice = $fiscalYear->invoices()->find($id);
        $invoice = new InvoiceResource($invoice);
        $invoiceItems = new InvoiceItemCollection(InvoiceItem::where('invoice_id', $id)->latest()->get());
        return response()->json([
            'invoice' => $invoice,
            'invoiceItems' => $invoiceItems,
        ]);
    }
    function deleteInvoiceItem(int $id)
    {
        $deleted = InvoiceItem::findOrFail($id)->delete();
        $data = [
            'success' => true,
            'message' => 'Item deleted successfully'
        ];
        if (!$deleted) {
            $data = [
                'success' => false,
                'message' => 'Something went wrong'
            ];
        }
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Invoice $invoice)
    {
        $clients = Client::get();
        $activeYear = $request->year ? $request->year : currentFiscalYear();
        $clients = Client::get();
        $fiscalYear = FiscalYear::where('year', $activeYear)->first();
        $invoice = $fiscalYear->invoices()->find($invoice->id);
        return view('backend.invoice.edit-invoice', compact('invoice', 'clients', 'activeYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $fiscalYear = FiscalYear::where('year', $request->year)->first();
        $fiscalYear = $fiscalYear === null ? FiscalYear::create(['year' => $request->year]) : $fiscalYear;

        // dd($fiscalYear);
        // if ($request->hasFile('header_image')) {
        //     $header_image = saveImage($request->image, 'invoices', 'invoice');
        // } else {
        //     $header_image = Invoice::first()->header_image;
        // }
        $invoice->update([
            'client_id' => $request->client,
            'reference_no' => $request->reference,
            'note' => $request->note,
            'payment_note' => $request->payment_note,
            'payment_method' => $request->payment_method,
        ]);

        $demand = (int) $request->total;
        $paid = (int) $request->paid;
        $due = (int) $request->due;
        $status = $due === 0 ? 'due' : '';
        $status = $paid > 0 && $paid === $demand ? 'paid' : 'partial';
        Calendar::create([
            'title' => 'Invoice ' . $status,
            'client_id' => $invoice->client_id,
            'service' => 'Invoice',
            'type' => 'Invoice ' . $status,
            'start' => today('Asia/Dhaka'),
            'description' => null
        ]);


        if ($fiscalYear->wasRecentlyCreated) {
            $invoice->fiscalYears()->attach($fiscalYear->id, [
                'discount' => $request->discount,
                'sub_total' => $request->sub_total,
                'demand' => $demand,
                'paid' => $paid,
                'due' => $due,
                'status' => $status,
                'payment_date' => $due == 0 ? now() : null,
                'due_date' => $request->due_date,
                'issue_date' => $request->issue_date,
            ]);
        } else {
            $invoice->fiscalYears()
                ->wherePivot('invoice_id', $invoice->id)
                ->wherePivot('fiscal_year_id', $fiscalYear->id)
                ->update([
                    'discount' => $request->discount,
                    'sub_total' => $request->sub_total,
                    'demand' => $demand,
                    'paid' => $paid,
                    'due' => $due,
                    'status' => $status,
                    'payment_date' => $due == 0 ? now() : null,
                    'due_date' => $request->due_date,
                    'issue_date' => $request->issue_date,
                ]);
        }

        //invoice Items
        $items = [];
        foreach ($request->item_names as $key => $name) {
            // taxes
            $taxes = [];
            if ($request["tax-$key-rates"]) {
                foreach ($request["tax-$key-rates"] as $index => $name) {
                    $array = [
                        'name' => $request["tax-$key-names"][$index],
                        'rate' => $request["tax-$key-rates"][$index],
                        'number' => $request["tax-$key-numbers"][$index],
                    ];
                    array_push($taxes, $array);
                }
            }
            $item = [
                'invoice_id' => $invoice->id,
                'name' => $request['item_names'][$key],
                'description' => $request['item_descriptions'][$key],
                'rate' => $request['item_rates'][$key],
                'qty' => $request['item_qtys'][$key],
                'total' => $request['item_rates'][$key] * $request['item_qtys'][$key],
                'taxes' => json_encode($taxes),
            ];
            $items[] = $item;
        }
        // fetch existing items to update
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice->id)->latest()->get();
        // update existing items
        foreach ($invoiceItems as $key => $invoiceItem) {
            $item = array_shift($items);
            $invoiceItem = InvoiceItem::where('invoice_id', $invoice->id)->where('id', $invoiceItem->id)->update($item);
        }
        // create if items left
        if (!empty($items)) {
            foreach ($items as $key => $item) {
                $invoiceItem = InvoiceItem::create($item);
            }
        }
        $alert = [
            'message' => "Invoice Updated Successfully",
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        $alert = [
            'message' => "Invoice Deleted Successfully",
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function markAs(Request $request, Invoice $invoice, string $status)
    {
        $fiscalYear = FiscalYear::where('year', $request->year)->first();
        $paid = $invoice->fiscalYears()->find($fiscalYear->id)->pivot->demand;
        $amountDetails = [];
        if ($status === 'paid') {
            $amountDetails = [
                'paid' => $paid,
                'due'=> 0
            ];
            $this->createExpense($invoice);  
        }
        $invoice->fiscalYears()->updateExistingPivot($fiscalYear->id, [
            'status' => $status,
            ...$amountDetails
        ]);
        Calendar::create([
            'title' => 'Invoice ' . $status,
            'invoice_id' => $invoice->id,
            'client_id' => $invoice->client_id,
            'service' => 'Invoice',
            'type' => 'Invoice ' . $status,
            'start' => today('Asia/Dhaka'),
            'description' => null
        ]);
        return back()->with([
            'alert-type' => 'success',
            'message' => str("marked as $status")->title()
        ]);
    }

    public function sendInvoiceMail(Request $request, $id)
    {
        $request->validate([
            'email_to'=> 'email',
            'subject'=> 'string|max:255'
        ]);
        $invoice = Invoice::find($id);
        $year = $request->year ? $request->year : currentFiscalYear();
        // dd($year);

        Mail::to($request->email_to)->queue(new InvoiceMail($invoice, $year, $request->subject));

        $fiscalYear = FiscalYear::where('year', $request->year)->first();
        $invoice->fiscalYears()->updateExistingPivot($fiscalYear->id, [
            'status' => 'sent'
        ]);
        Calendar::create([
            'title' => 'Invoice Sent',
            'invoice_id' => $invoice->id,
            'client_id' => $invoice->client_id,
            'service' => 'Invoice',
            'type' => 'Invoice Sent',
            'start' => today('Asia/Dhaka'),
            'description' => 'Email sent to '.$request->email_to
        ]);
        $alert = [
            'message' => "Invoice Mail Send Successfully",
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function filterInvoices(Request $request)
    {
        $recentInvoices = Invoice::with('client', 'currentFiscal')->latest()->limit(5)->latest()->get();
        $references = Invoice::select('reference_no')->distinct()->latest()->get()->pluck('reference_no');
        $zones = Client::select('zone')->distinct()->latest()->get()->pluck('zone');
        $circles = Client::select('circle')->distinct()->latest()->get()->pluck('circle');
        $clients = Client::latest()->latest()->get();
        $filter = new InvoiceFilter();
        $queries = $filter->transform($request);
        // dd($queries);
        $invoiceQueries = array_filter($queries, fn ($query) => $query[0] === 'client_id' || $query[0] === 'reference_no');
        $clientQueries = array_filter($queries, fn ($query) => $query[0] === 'zone' || $query[0] === 'circle');
        $fiscalQueries = array_filter($queries, fn ($query) => $query[0] === 'year');
        $pivotQueries = array_filter($queries, fn ($query) => str_contains($query[0], 'fiscal_year_invoice'));
        // dd($fiscalYear);
        $invoiceQueries =  array_values($invoiceQueries);
        $clientQueries =  array_values($clientQueries);
        $fiscalQueries =  array_values($fiscalQueries);
        $pivotQueries =  array_values($pivotQueries);
        $fiscalYear = $fiscalQueries[0][2];

        $invoices = Invoice::with('fiscalYears')->where($invoiceQueries)
            ->whereHas('client', function (Builder $query) use ($clientQueries) {
                $query->where($clientQueries);
            })
            ->whereHas('fiscalYears', function ($query) use ($fiscalQueries, $pivotQueries) {
                $query->where($fiscalQueries)
                    ->where($pivotQueries);
            })
            ->latest()->get();
        return view('backend.invoice.viewAll', compact('recentInvoices', 'invoices', 'clients', 'references', 'zones', 'circles', 'fiscalYear'));
    }


    public function createExpense(Invoice $invoice) {
        $amount = $invoice->paid;
        $balance = $amount;
        $lastBalance = Expense::latest()->first('balance')->balance;
        $invoicePivot = $invoice->fiscalYears()->latest()->first()->pivot;
        $balance += $lastBalance;
        Expense::create([
            'date' => today('Asia/Dhaka'),
            'category' => 'invoice',
            'type' => 'credit',
            'amount'=> $amount,
            'balance'=> $balance,
            'items'=> [
                [
                    'description'=> [
                        'client_name'=> $invoice->client->name,
                        'company_name'=> $invoice->client->company_name,
                        'tin'=> $invoice->client->tin,
                        'ref_no'=> $invoice->client->ref_no,
                        'invoice_number'=> $invoice->id,
                        'invoice_issue_date'=> Carbon::parse($invoicePivot->issue_date)->format('d/m/Y'),
                        'invoice_due_date'=> Carbon::parse($invoicePivot->due_date)->format('d/m/Y'),
                    ],
                    'amount'=> $amount ,
                ]
            ]
        ]);
    }
}
