<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use App\Models\Calendar;
use App\Models\UserAppointment;
use App\Notifications\AppointmentApprovedNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class UserAppointmentController extends Controller
{
    public function __construct() {
        if (auth()->user() == null) {
            return redirect(route('login'));
        }
        if (request('type') != 'consultation'){
            if(!auth()->user()->hasRole('super admin')){
                abort(403, 'You don\'t have access to this page');
            }
        }
    }
    public function index()
    {
        $expert = auth()->user()->expertProfile;
        $appointments = UserAppointment::where('is_approved', false)
        ->where(function (Builder $q) use ($expert) {
            if (request('type') == 'consultation') {
                $q->whereNotNull('expert_profile_id');
                if ($expert != null) {
                    $q->where('expert_profile_id', $expert->id);
                }
            }{
                $q->whereNull('expert_profile_id');
            }
        })
        ->with('map', 'user')->latest()->paginate(paginateCount());
        $apt = $appointments->first();

        return view('backend.user.appointments', compact('appointments'));
    }
    public function times()
    {
        $carbon = now('Asia/Dhaka')->subDays(4)->locale('en_BD');
        $dates = [];
        for ($i = 1; $i <= 7; $i++) {
            $date = $carbon->addDay();
            $dates[$date->format('l')] = AppointmentTime::where('user_id', auth()->id())->where('day', $date->format('l'))->first()->times ?? [];
        }

        return view('backend.user.appointment-times', compact('dates'));
    }
    public function timesUpdate(Request $request)
    {
        AppointmentTime::where('user_id', auth()->id())->delete();
        foreach ($request->times as $day => $times) {
            AppointmentTime::create([
                'user_id' => auth()->id(),
                'day'=> $day,
                'times' => $times
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
        $expert = auth()->user()->expertProfile;
        $appointments = UserAppointment::where(['is_approved' => true, 'is_completed' => false])
        ->where(function (Builder $q) use ($expert) {
            if (request('type') == 'consultation') {
                $q->whereNotNull('expert_profile_id');
                if ($expert != null) {
                    $q->where('expert_profile_id', $expert->id);
                }
            }{
                $q->whereNull('expert_profile_id');
            }
        })
        ->with('map', 'user')->latest('approved_at')->get();

        return view('backend.user.appointmentsApproved', compact('appointments'));
    }

    public function completedList()
    {
        $expert = auth()->user()->expertProfile;
        $appointments = UserAppointment::where(['is_completed' => true])
        ->where(function (Builder $q) use ($expert) {
            if (request('type') == 'consultation') {
                $q->whereNotNull('expert_profile_id');
                if ($expert != null) {
                    $q->where('expert_profile_id', $expert->id);
                }
            }{
                $q->whereNull('expert_profile_id');
            }
        })
        ->with('map', 'user')->latest('completed_at')->get();

        return view('backend.user.appointmentsCompleted', compact('appointments'));
    }

    public function approve(int $id)
    {
        $appointment = UserAppointment::find($id);
        if ($appointment->expert_profile_id != null) {
            $expert = auth()->user()->expertProfile;
            if ($expert != null && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!'
                ]);
            }
        }
        $appointment->is_approved = true;
        $appointment->approved_at = now();
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
        if ($appointment->expert_profile_id != null) {
            $expert = auth()->user()->expertProfile;
            if ($expert != null && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!'
                ]);
            }
        }
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
        if ($appointment->expert_profile_id != null) {
            $expert = auth()->user()->expertProfile;
            if ($expert != null && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!'
                ]);
            }
        }
        $appointment->delete();
        $alert = [
            'message' => 'Appointment Deleted',
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }
}
