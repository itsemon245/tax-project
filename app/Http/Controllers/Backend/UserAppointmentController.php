<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserAppointment;
use Illuminate\Http\Request;

class UserAppointmentController extends Controller
{
    function index() {
        $appointments = UserAppointment::with('map', 'user')->latest()->get();
        return view('backend.user.appointments', compact('appointments'));
    }
}
