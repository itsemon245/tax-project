<?php

namespace App\Http\Controllers\Backend\Chalan;

use App\Models\Chalan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.chalan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.chalan.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'chalan_no'=>'required',
            'date'=>'required',
            'chalan_title'=>'required',
            'code1'=>'required',
            'code2'=>'required',
            'code3'=>'required',
            'code4'=>'required',
            'code5'=>'required',
            'code6'=>'required',
            'code7'=>'required',
            'code8'=>'required',
            'code9'=>'required',
            'code10'=>'required',
            'code11'=>'required',
            'code12'=>'required',
            'code13'=>'required',
            'name'=>'required',
            'location'=>'required',
            'phone_number'=>'required',
            'client_name'=>'required',
            'company_name'=>'required',
            'tin:/circle'=>'required',
            'purpose'=>'required',
            'year'=>'required',
            'payment_method'=>'required',
            'org_name_text'=>'required',
            'taka_kothay'=>'required',
            'total_ammount'=>'required',
            'take_poua_gelo'=>'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chalan $chalan)
    {
        return view('backend.chalan.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chalan $chalan)
    {
        return view('backend.chalan.clone');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chalan $chalan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chalan $chalan)
    {
        //
    }
}
