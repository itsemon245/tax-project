<?php

namespace App\Http\Controllers\Backend\Invoice;

use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Client;
use App\Models\InvoiceItem;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //storing data test

        $discount = 10;
        $invoice = new Invoice();
        $invoice->client_id = 1;
        $invoice->header_image = "https://picsum.photos/seed/picsum/200/300";
        $invoice->reference_no = "245";
        $invoice->circle = "circle";
        $invoice->notes = "notes";
        $invoice->purpose = "purpose";
        $invoice->discount = $discount;
        $invoice->due_date = now()->addDays(7)->format('Y-m-d');
        $invoice->save();

        //<--invoice items calculation-->
        $taxes = [
            [
                'name' => 'tax 1',
                'rate' => 5,
                'note' => 'tax 1 note',
                'isApplied' => true,
            ],
            [
                'name' => 'tax 2',
                'rate' => 10,
                'note' => 'tax 2 note',
                'isApplied' => false,
            ],
        ];
        $totalTax = 0; //in percentage
        foreach ($taxes as $tax) {
            $totalTax += $tax['rate'];
        }
        $rate = 220;
        $qty = 2;
        $subTotal = ($rate * $qty) + ($rate * $qty)*$totalTax/100; //add taxes
        $invoiceItem = InvoiceItem::create([
            'invoice_id'=> $invoice->id,
            'name'=> 'service 1',
            'description'=> 'service 1 description',
            'rate'=> $rate,
            'qty'=> $qty,
            'total' => $subTotal,
            'taxes'=> json_encode($taxes),
        ]);
        //<!--invoice item calculation -->


        //invoice calculation
        $invoice->sub_total = $subTotal;
        $invoice->total = $invoice->sub_total - ($invoice->sub_total * $discount/100);//subtract discount
        $invoice->amount_paid = 200;
        $invoice->amount_due = $invoice->total - $invoice->amount_paid;
        $invoice->save();
        dd($invoice);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::get();
        return view('backend.invoice.createInvoice', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
     return view('backend.invoice.dynamicInvoice');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
