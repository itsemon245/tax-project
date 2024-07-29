<?php

namespace App\Http\Controllers;

use App\Models\PartnerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class PartnerRequestController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
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
        if (null === $pending) {
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
            ->with([
                'message' => 'Request Submit! Wait for Approved.',
                'alert-type' => 'success',
            ]);
        } else {
            return back()
            ->with([
                'message' => 'Already Submitted! Wait for Approved.',
                'alert-type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $findRequest = PartnerRequest::find($id);
        // dd( $findRequest);
        if ($findRequest) {
            $findRequest->status = 1;
            $findRequest->save();
            if ($findRequest->save()) {
                $updateUser = User::find($findRequest->user_id);
                $updateUser->name = $findRequest->name;
                $updateUser->phone = $findRequest->phone;
                $updateUser->division = $findRequest->division;
                $updateUser->district = $findRequest->district;
                $updateUser->thana = $findRequest->thana;
                $updateUser->address = $findRequest->address;
                $updateUser->save();
                $notification = [
                    'message' => 'Approved Success',
                    'alert-type' => 'Success',
                ];

                return back()->with($notification);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
    }
}
