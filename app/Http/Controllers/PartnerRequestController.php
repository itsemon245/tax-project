<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PartnerRequest;
use Illuminate\Support\Facades\DB;

class PartnerRequestController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd();
        $request->validate([
            'name' => ['string', 'max:255'],
            'phone' => ['max:20', 'min:11'],
            'division' => ['required', 'string'],
            'district' => ['required', 'string'],
            'thana' => ['required', 'string'],
            'address' => ['required', 'string'],
        ]);
        $auth = auth()->user();
        $pending = PartnerRequest::where('user_id', $auth->id)->first();
        if($pending === null){
            PartnerRequest::create([
                'user_id' => $auth->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'division' => $request->division,
                'district' => $request->district,
                'thana' => $request->thana,
                'address' => $request->address,
            ]);
            return back()
            ->with(array(
                'message'       => "Request Submit! Wait for Approved.",
                'alert-type'    => 'success',
            ));
        }else{
            return back()
            ->with(array(
                'message'       => "Already Submitted! Wait for Approved.",
                'alert-type'    => 'error',
            ));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $findRequest = PartnerRequest::find($id);
        $approved = DB::table('users')->update([
            'name' => $findRequest->name,
            'phone' => $findRequest->phone,
            'division' => $findRequest->division,
            'thana' => $findRequest->thana,
            'address' => $findRequest->address,
        ]);
        if($approved == 0){
            DB::table('partner_requests')->update([
                'status' => 1,
            ]);
            $notification = array(
                'message' => 'Approved Success',
                'alert-type' => 'Success',
            );
            return back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
