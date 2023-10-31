<?php

namespace App\Http\Controllers\Backend;

use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Models\UserAppointment;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserAppointmentController extends Controller
{
    function index()
    {
        $appointments = UserAppointment::where('is_approved', false)->with('map', 'user')->latest()->paginate(paginateCount());
        return view('backend.user.appointments', compact('appointments'));
    }
    function approvedList()
    {
        $appointments = UserAppointment::where(['is_approved' => true, 'is_completed' => false])->with('map', 'user')->latest()->get();
        return view('backend.user.appointmentsApproved', compact('appointments'));
    }
    function completedList()
    {
        $appointments = UserAppointment::where(['is_completed' => true])->with('map', 'user')->latest()->get();
        return view('backend.user.appointmentsCompleted', compact('appointments'));
    }

    function approve(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->is_approved = true;
        $appointment->update();
        Calendar::create([
            'title' => 'Appointment Scheduled',
            'user_appointment_id' => $appointment->id,
            'service' => 'Appointment',
            'type' => 'Scheduled',
            'start' => Carbon::parse($appointment->date.", " .$appointment->time, 'Asia/Dhaka')->format('Y-m-d H:m:s'),
            'description' => null
        ]);
        $alert = [
            'message' => 'Appointment Approved',
            'alert-type' => 'success'
        ];
        return back()->with($alert);
    }
    function complete(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->is_completed = true;
        $appointment->update();
        Calendar::create([
            'title' => 'Appointment Completed',
            'user_appointment_id' => $appointment->id,
            'service' => 'Appointment',
            'type' => 'Completed',
            'start' => today('Asia/Dhaka'),
            'description' => null
        ]);
        $alert = [
            'message' => 'Appointment Completed',
            'alert-type' => 'success'
        ];
        return back()->with($alert);
    }
    function destroy(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->delete();
        $alert = [
            'message' => 'Appointment Deleted',
            'alert-type' => 'success'
        ];
        return back()->with($alert);
    }
}
