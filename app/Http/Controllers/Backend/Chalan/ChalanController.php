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
            'description' => 'nullable|string',
            'client_id' => 'nullable|numeric',
            'purpose' => 'nullable|string',
            'year' => 'nullable|string',
            'payment_type' => 'nullable|string',
            'cheque_no' => 'nullable|string',
            'bank' => 'nullable|string',
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
     
        $clients = Client::latest()->get();
        return view('backend.chalan.clone', compact('chalan', 'clients'));
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
