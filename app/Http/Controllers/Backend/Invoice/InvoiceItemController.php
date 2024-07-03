<?php

namespace App\Http\Controllers\Backend\Invoice;

// use Barryvdh\DomPDF\PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceItemController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $pdf = Pdf::loadView('backend.invoice.dynamicInvoice');

        return $pdf->stream();
        // return view('backend.invoice.dynamicInvoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceItemRequest $request) {
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceItem $invoiceItem) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceItem $invoiceItem) {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceItemRequest $request, InvoiceItem $invoiceItem) {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceItem $invoiceItem) {
    }
}
