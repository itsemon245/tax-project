<?php

namespace App\Http\Controllers\Backend\Chalan;

use App\Models\User;
use App\Models\Chalan;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chalan::latest()->simplePaginate(paginateCount());
        return view('backend.chalan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::latest()->get();
        // $location = $users->location;
        // $company = $users->company;
        // $circle = $users->circle;
        return view('backend.chalan.create', compact('clients'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'chalan_no' => 'required',
            'date' => 'required',
            'chalan_title' => 'required',
            'code1' => 'required',
            'code2' => 'required',
            'code3' => 'required',
            'code4' => 'required',
            'code5' => 'required',
            'code6' => 'required',
            'code7' => 'required',
            'code8' => 'required',
            'code9' => 'required',
            'code10' => 'required',
            'code11' => 'required',
            'code12' => 'required',
            'code13' => 'required',
            'name' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'client_name' => 'required',
            'company_name' => 'required',
            'tin_circle' => 'required',
            'purpose' => 'required',
            'year' => 'required',
            'payment_method' => 'required',
            'org_name_text' => 'required',
            'taka_kothay' => 'required',
            'total_ammount' => 'required',
            'take_poua_gelo' => 'required',
        ]);

        Chalan::create([
            'chalan_no' => $request->chalan_no,
            'date' => $request->date,
            'chalan_title' => $request->chalan_title,
            'code1' => $request->code1,
            'code2' => $request->code2,
            'code3' => $request->code3,
            'code4' => $request->code4,
            'code5' => $request->code5,
            'code6' => $request->code6,
            'code7' => $request->code7,
            'code8' => $request->code8,
            'code9' => $request->code9,
            'code10' => $request->code10,
            'code11' => $request->code11,
            'code12' => $request->code12,
            'code13' => $request->code13,
            'name' => $request->name,
            'location' => $request->location,
            'phone_number' => $request->phone_number,
            'client_name' => $request->client_name,
            'company_name' => $request->company_name,
            'tin_circle' => $request->tin_circle,
            'purpose' => $request->purpose,
            'year' => $request->year,
            'payment_method' => $request->payment_method,
            'total_ammount' => $request->total_ammount,
            'take_poua_gelo' => $request->take_poua_gelo,
            'org_name_text' => $request->org_name_text,
            'taka_kothay' => $request->taka_kothay,
        ]);

        $notification = [
            'message' => 'Chalan Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chalan $chalan)
    {
        $chalan = Chalan::find($chalan->id);
        return view('backend.chalan.show', compact('chalan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chalan $chalan)
    {
        Chalan::create([
            'chalan_no' => $chalan->chalan_no,
            'date' => $chalan->date,
            'chalan_title' => $chalan->chalan_title,
            'code1' => $chalan->code1,
            'code2' => $chalan->code2,
            'code3' => $chalan->code3,
            'code4' => $chalan->code4,
            'code5' => $chalan->code5,
            'code6' => $chalan->code6,
            'code7' => $chalan->code7,
            'code8' => $chalan->code8,
            'code9' => $chalan->code9,
            'code10' => $chalan->code10,
            'code11' => $chalan->code11,
            'code12' => $chalan->code12,
            'code13' => $chalan->code13,
            'name' => $chalan->name,
            'location' => $chalan->location,
            'phone_number' => $chalan->phone_number,
            'client_name' => $chalan->client_name,
            'company_name' => $chalan->company_name,
            'tin_circle' => $chalan->tin_circle,
            'purpose' => $chalan->purpose,
            'year' => $chalan->year,
            'payment_method' => $chalan->payment_method,
            'total_ammount' => $chalan->total_ammount,
            'take_poua_gelo' => $chalan->take_poua_gelo,
            'org_name_text' => $chalan->org_name_text,
        ]);

        $notification = [
            'message' => 'Chalan Copy',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chalan $chalan)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chalan $chalan)
    {
        Chalan::where('id', $chalan->id)->delete();


        $notification = [
            'message' => 'Chalan Deleted',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function user($id)
    {
        $client = Client::find($id);
        $location = $client->present_address;
        $company = $client->company_name;
        $circle = $client->circle;
        return response()->json([
            'location' => $location,
            'company' => $company,
            'circle' => $circle,
        ]);
    }
}
