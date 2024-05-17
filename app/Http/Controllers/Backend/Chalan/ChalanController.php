<?php

namespace App\Http\Controllers\Backend\Chalan;

use App\Models\User;
use App\Models\Chalan;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use NumberFormatter as NF;

class ChalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Chalan::with('client')->latest()->latest()->paginate(paginateCount());
        return view('backend.chalan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::latest()->latest()->get();
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
            'cheque_expire_date' => 'nullable|date',
            'bank' => 'nullable|string',
            'branch' => 'nullable|string',
            'amount' => 'nullable|string',
            'amount_in_words' => 'nullable|string',

        ]);
        Chalan::create([
            ...$validated
        ]);

        $notification = [
            'message' => 'Chalan Created',
            'alert-type' => 'success',
        ];
        return redirect(route('chalan.index'))->with($notification);
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
     
        $clients = Client::latest()->latest()->get();
        return view('backend.chalan.edit', compact('chalan', 'clients'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function clone(Chalan $chalan)
    {
     
        $clients = Client::latest()->latest()->get();
        return view('backend.chalan.clone', compact('chalan', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chalan $chalan)
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
            'cheque_expire_date' => 'nullable|date',
            'bank' => 'nullable|string',
            'branch' => 'nullable|string',
            'amount' => 'nullable|string',
            'amount_in_words' => 'nullable|string',

        ]);
        $chalan->update([
            ...$validated
        ]);

        $notification = [
            'message' => 'Chalan Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
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
    /**
     * Spells a given amount
     */
    public function spellNumber(int $number): JsonResponse
    {
        $formatter = new NF('en_BD', NF::SPELLOUT);
        $spelled = $formatter->format($number);
        return response()->json($spelled);
    }
}
