<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAppointment;
use App\Http\Requests\StoreUserAppointmentRequest;
use App\Http\Requests\UpdateUserAppointmentRequest;

class UserAppointmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $appointment = UserAppointment::create([
            "date" => $request->date,
            "time" => $request->time,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "district" => $request->district,
            "thana" => $request->thana,
            "map_id" => $request->location,
            "is_physical" => $request->is_physical ? $request->is_physical : false,
            "user_id" => $request->user_id,
        ]);
        $alert = [
            'alert-type' => 'success', 
            'message' => 'Request Submitted'
        ];
        return back()->with($alert);
    }

    
}
