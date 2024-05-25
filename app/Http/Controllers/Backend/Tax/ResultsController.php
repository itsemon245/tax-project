<?php

namespace App\Http\Controllers\Backend\Tax;

use App\Http\Controllers\Controller;
use App\Models\TaxCalculator;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    function index()
    {
        $results = TaxCalculator::with([
            'user',
            'user.roles:name'
        ])->latest()->latest()->paginate(paginateCount());
        return view('backend.taxCalculator.results', compact('results'));
    }
    function destroy(int $id)
    {
        $results = TaxCalculator::find($id)->delete();
        return back()->with([
            'alert-type' => 'success',
            'message' => 'Record Deleted!'
        ]);
    }
}
