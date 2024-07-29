<?php

namespace App\Http\Controllers;

use App\Models\UserAppointment;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller {
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        dd($request->all());

        if ($request->is_physical && null == $request->location) {
            $alert = [
                'alert-type' => 'error',
                'message' => 'No location has been selected',
            ];

            return back()->with($alert);
        }
        $appointment = UserAppointment::create([
            'date' => $request->date,
            'expert_profile_id' => $request->expert_id,
            'time' => $request->time,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'district' => $request->district,
            'thana' => $request->thana,
            'map_id' => $request->location,
            'is_physical' => $request->is_physical ? $request->is_physical : false,
            'user_id' => $request->user_id,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Request Submitted',
        ];

        return back()->with($alert);
    }
}
