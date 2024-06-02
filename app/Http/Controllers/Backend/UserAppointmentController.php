<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Appoinment;
use App\Models\AppointmentTime;
use App\Models\Calendar;
use App\Models\UserAppointment;
use App\Notifications\AppointmentApprovedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class UserAppointmentController extends Controller
{
    public function index()
    {
        $appointments = UserAppointment::where('is_approved', false)->with('map', 'user')->latest()->latest()->paginate(paginateCount());
        $apt = $appointments->first();

        return view('backend.user.appointments', compact('appointments'));
    }
    public function times()
    {
        $times = AppointmentTime::get();

        return view('backend.user.appointment-times', compact('times'));
    }
    public function timesUpdate(Request $request)
    {
        AppointmentTime::where('user_id', auth()->id())->delete();
        foreach ($request->times as $time) {
            AppointmentTime::create([
                'user_id' => auth()->id(),
                'time' => $time
            ]);
        }
        $alert = [
            'alert-type' => 'success',
            'message' => 'Updated Successfully!'
        ];
        return back()->with($alert);
    }
    public function timeDelete(AppointmentTime $time)
    {
        $time->delete();
        $alert = [
            'alert-type' => 'success',
            'message' => 'Deleted Successfully!'
        ];
        return back()->with($alert);
    }

    public function approvedList()
    {
        $appointments = UserAppointment::where(['is_approved' => true, 'is_completed' => false])->with('map', 'user')->latest('updated_at')->latest()->get();

        return view('backend.user.appointmentsApproved', compact('appointments'));
    }

    public function completedList()
    {
        $appointments = UserAppointment::where(['is_completed' => true])->with('map', 'user')->latest('completed_at')->latest()->get();

        return view('backend.user.appointmentsCompleted', compact('appointments'));
    }

    public function approve(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->is_approved = true;
        $appointment->update();
        Calendar::create([
            'title' => 'Appointment Scheduled',
            'user_appointment_id' => $appointment->id,
            'service' => 'Appointment',
            'type' => 'Scheduled',
            'start' => Carbon::parse($appointment->date.', '.$appointment->time, 'Asia/Dhaka')->format('Y-m-d H:m:s'),
            'description' => null,
        ]);
        Notification::route('mail', $appointment->email)->notify(new AppointmentApprovedNotification($appointment));
        $alert = [
            'message' => 'Appointment Approved',
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function complete(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->is_completed = true;
        $appointment->completed_at = now();
        $appointment->update();
        Calendar::create([
            'title' => 'Appointment Completed',
            'user_appointment_id' => $appointment->id,
            'service' => 'Appointment',
            'type' => 'Completed',
            'start' => today('Asia/Dhaka'),
            'description' => null,
        ]);
        $alert = [
            'message' => 'Appointment Completed',
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function destroy(int $id)
    {
        $appointment = UserAppointment::find($id);
        $appointment->delete();
        $alert = [
            'message' => 'Appointment Deleted',
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }
}
