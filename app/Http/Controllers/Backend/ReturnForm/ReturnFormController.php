<?php

namespace App\Http\Controllers\Backend\ReturnForm;

use App\Models\ReturnForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.return.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.return.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnForm $returnForm)
    {
        return view('backend.return.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnForm $returnForm)
    {
        return view('backend.return.clone');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnForm $returnForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnForm $returnForm)
    {
        //
    }
}
