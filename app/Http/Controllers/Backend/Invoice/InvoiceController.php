<?php

namespace App\Http\Controllers\Backend\Invoice;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Resources\InvoiceItemCollection;
use App\Http\Resources\InvoiceItemResource;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentInvoices = Invoice::with('client')->latest()->limit(5)->get();
        $invoices = Invoice::with('client')->latest()->get();
        $references = Invoice::select('reference_no')->distinct()->get()->pluck('reference_no');
        // dd($references);
        $clients = Client::get();
        return view('backend.invoice.viewAll', compact('recentInvoices', 'invoices', 'clients', 'references'));
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
            'discount' => $request->discount,
            'sub_total' => $request->sub_total,
            'total' => $request->total,
            'amount_paid' => $request->paid,
            'amount_due' => $request->due,
            'payment_note' => $request->payment_note,
            'payment_method' => $request->payment_method,
            'due_date' => $request->due_date,
            'issue_date' => $request->issue_date,
        ]);


        //invoice Items
        foreach ($request->item_names as $key => $name) {
            // taxes
            $taxes = [];
            foreach ($request["tax-$key-names"] as $id => $name) {
                $array = [
                    'name' => $request["tax-$key-names"][$id],
                    'rate' => $request["tax-$key-rates"][$id],
                    'number' => $request["tax-$key-numbers"][$id],
                ];
                array_push($taxes, $array);
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
    public function show(Invoice $invoice)
    {
        $clients = Client::get();
        $invoice=Invoice::with('client','invoiceItems')->find($invoice->id);
        //dd($invoice);
        return view('backend.invoice.viewOne', compact('invoice', 'clients'));
    }

    function getInvoiceData($id)
    {
        $invoice = new InvoiceResource(Invoice::find($id));
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
    public function edit(Invoice $invoice)
    {
        $clients = Client::get();
        $invoice=Invoice::with('client','invoiceItems')->find($invoice->id);
        return view('backend.invoice.edit-invoice', compact('invoice', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $header_image = null;
        // dd($request->all());
        if ($request->hasFile('header_image')) {
            $header_image = saveImage($request->image, 'invoices', 'invoice');
        } else {
            $header_image = Invoice::first()->header_image;
        }
        $updated = Invoice::where('id', $invoice->id)->update([
            'client_id' => $request->client,
            'header_image' => $header_image,
            'reference_no' => $request->reference,
            'note' => $request->note,
            'discount' => $request->discount,
            'sub_total' => $request->sub_total,
            'total' => $request->total,
            'amount_paid' => $request->paid,
            'amount_due' => $request->due,
            'payment_note' => $request->payment_note,
            'payment_method' => $request->payment_method,
            'due_date' => $request->due_date,
            'issue_date' => $request->issue_date,
        ]);
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
}
