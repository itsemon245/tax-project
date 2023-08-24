<?php

namespace App\Http\Controllers\Backend\Invoice;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FiscalYear;

class ReportController extends Controller
{
    function index(string $type)
    {
        $invoices = Invoice::get();
        $fiscalYear = currentFiscalYear();
        $fiscalYears = FiscalYear::latest()->take(3)->get()->reverse();
        return view('backend.report.index', compact('invoices', 'fiscalYear', 'fiscalYears', 'type'));
    }
    function ledger()
    {
        $invoices = Invoice::get();
        $fiscalYear = currentFiscalYear();
        $fiscalYears = FiscalYear::latest()->take(3)->get()->reverse();
        return view('backend.report.ledger', compact('invoices', 'fiscalYear', 'fiscalYears'));
    }
}
