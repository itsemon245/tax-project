<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAppointmentRequest;
use App\Http\Requests\UpdateUserAppointmentRequest;
use App\Models\UserAppointment;

class UserAppointmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAppointmentRequest $request)
    {
        // dd($request->all());
        $appointment = UserAppointment::create([
            "date" => $request->date,
            "time" => $request->time,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "district" => $request->district,
            "thana" => $request->thana,
            "map_id" => $request->location,
            "user_id" => $request->user_id,
        ]);
        $alert = [
            'alert-type' => 'Success', 
            'message' => 'Appointment Request Submitted'
        ];
        return back()->with($alert);
    }

    
}
