<?php

namespace App\Http\Controllers;

use App\Models\TaxCalculator;
use App\Http\Requests\StoreTaxCalculatorRequest;
use App\Http\Requests\UpdateTaxCalculatorRequest;

class TaxCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.taxCalculator.taxCalculator");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaxCalculatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaxCalculator $taxCalculator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaxCalculator $taxCalculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaxCalculatorRequest $request, TaxCalculator $taxCalculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaxCalculator $taxCalculator)
    {
        //
    }
}
