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
        return view('backend.chalan.create', compact('clients'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chalan_no' => 'nullable|numeric',
            'date' => 'nullable|date',
            'bank_name' => 'nullable|string',
            'code' => 'nullable|string',
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'client_id' => 'nullable|numeric',
            'purpose' => 'nullable|string',
            'year' => 'nullable|string',
            'payment_type' => 'nullable|string',
            'cheque_no' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'branch' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'amount_in_words' => 'nullable|string',

        ]);
        Chalan::create([
            ...$validated
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
    public function clientInfo($id)
    {
        $client = Client::find($id, ['id', 'present_address', 'company_name', 'circle', 'tin'])->toArray();
        return response()->json($client);
    }
}
