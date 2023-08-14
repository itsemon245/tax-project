<?php

namespace App\Http\Controllers\Backend\Invoice;

use Exception;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Invoice;
use App\Mail\InvoiceMail;
use App\Models\FiscalYear;
use App\Models\InvoiceItem;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Filter\InvoiceFilter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\InvoiceCollection;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceItemResource;
use App\Http\Resources\InvoiceItemCollection;
use Error;
use ErrorException;
use Psy\Exception\ThrowUpException;
use Throwable;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentInvoices = Invoice::with('client', 'currentFiscal')->latest()->limit(5)->get();
        $fiscalYear = currentFiscalYear();
        // dd($recentInvoices[0]->currentFiscal[0]->pivot->status);
        $invoices = Invoice::with('client', 'currentFiscal')->latest()->get();
        $references = Invoice::select('reference_no')->distinct()->get()->pluck('reference_no');
        $zones = Client::select('zone')->distinct()->get()->pluck('zone');
        $circles = Client::select('circle')->distinct()->get()->pluck('circle');
        $clients = Client::latest()->get();
        return view('backend.invoice.viewAll', compact('recentInvoices', 'invoices', 'clients', 'references', 'zones', 'circles', 'fiscalYear'));
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
        if ($request->hasFile('header_image')) {
            $header_image = saveImage($request->image, 'invoices', 'invoice');
        } else {
            $header_image = Invoice::first()->header_image;
        }
        $invoice = Invoice::create([
            'client_id' => $request->client,
            'header_image' => $header_image,
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
            'payment_date' => $due == 0 ? now() : null,
            'due_date' => $request->due_date,
            'issue_date' => $request->issue_date,
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
        $invoiceItems = new InvoiceItemCollection(InvoiceItem::where('invoice_id', $id)->get());
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
        if ($request->hasFile('header_image')) {
            $header_image = saveImage($request->image, 'invoices', 'invoice');
        } else {
            $header_image = Invoice::first()->header_image;
        }
        $invoice->update([
            'client_id' => $request->client,
            'header_image' => $header_image,
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
        $invoiceItems = InvoiceItem::where('invoice_id', $invoice->id)->get();
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
        $invoice->fiscalYears()->updateExistingPivot($fiscalYear->id, [
            'status' => $status
        ]);
        return back()->with([
            'alert-type' => 'success',
            'message' => str("marked as $status")->title()
        ]);
    }

    public function sendInvoiceMail(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $year = $request->year ? $request->year : currentFiscalYear();
        // dd($year);

        Mail::to($request->email_to)->queue(new InvoiceMail($invoice, $year, $request->subject));

        $fiscalYear = FiscalYear::where('year', $request->year)->first();
        $invoice->fiscalYears()->updateExistingPivot($fiscalYear->id, [
            'status' => 'sent'
        ]);
        $alert = [
            'message' => "Invoice Mail Send Successfully",
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function filterInvoices(Request $request)
    {
        $content = [
            'data' => null,
            'success' => true,
            'message' => 'Request Successful'
        ];
        $invoices = null;
        $filter = new InvoiceFilter();
        $queries = $filter->transform($request);
        $invoiceQueries = array_filter($queries, fn ($query) => $query[0] === 'client_id' || $query[0] === 'reference_no');
        $clientQueries = array_filter($queries, fn ($query) => $query[0] === 'zone' || $query[0] === 'circle');
        $fiscalQueries = array_filter($queries, fn ($query) => $query[0] === 'year');
        $pivotQueries = array_filter($queries, function ($query) {
            return  $query[0] === 'paid' ||
                $query[0] === 'due' ||
                $query[0] === 'demand' ||
                $query[0] === 'issue_date' ||
                $query[0] === 'status' ||
                $query[0] === 'due_date';
        });
        if (Arr::isAssoc($pivotQueries)) {
            $pivotQueries =  array_values($pivotQueries);
        };

        try {
            $invoices = FiscalYear::where($fiscalQueries)->firstOrFail()->invoices()
                ->where($invoiceQueries)
                ->whereHas('client', function (Builder $query) use ($clientQueries) {
                    $query->where($clientQueries);
                })
                ->whereHas('fiscalYears', function ($query) use ($fiscalQueries, $pivotQueries) {
                    $query
                        ->where($fiscalQueries)
                        ->where($pivotQueries);
                })
                ->get();
            $content['data'] = new InvoiceCollection($invoices);
        } catch (Throwable $e) {
            $content['success'] = false;
            $content['message'] = $e->getMessage();
            return response($content, 404);
        }
        return response($content);
    }
}
