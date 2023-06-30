<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\MyDocument;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMyDocumentRequest;
use App\Http\Requests\UpdateMyDocumentRequest;

class MyDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.userdoc.userDoc');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMyDocumentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MyDocument $myDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyDocument $myDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMyDocumentRequest $request, MyDocument $myDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyDocument $myDocument)
    {
        //
    }
}
