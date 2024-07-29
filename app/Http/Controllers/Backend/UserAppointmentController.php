<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppointmentTime;
use App\Models\Calendar;
use App\Models\ExpertProfile;
use App\Models\UserAppointment;
use App\Notifications\AppointmentApprovedNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Log;
use Throwable;

class UserAppointmentController extends Controller {
    public function __construct() {
        if (null == auth()->user()) {
            return redirect(route('login'));
        }
        if ('consultation' != request('type')) {
            if (!auth()->user()->hasRole('super admin')) {
                abort(403, 'You don\'t have access to this page');
            }
        }
    }

    public function index() {
        /**
         * @var ?ExpertProfile $expert
         */
        $expert = auth()->user()->expertProfile;
        if ($expert) {
            $appointments = $expert->appointments()
                    ->unapproved()
                    ->with('map', 'user')
                    ->where(function(Builder $builder){
                        if (request('map_id')) {
                            $builder->where('map_id', request('map_id'));
                        }
                    })
                    ->latest()
                    ->paginate(paginateCount());
        } else {
            $appointments = UserAppointment::unapproved()
                ->with('map', 'user')
                ->where(function(Builder $builder){
                    if (request('map_id')) {
                        $builder->where('map_id', request('map_id'));
                    }

                    if (request('consultation')) {
                        $builder->whereNotNull('expert_profile_id');
                    } else{
                        $builder->whereNull('expert_profile_id');
                    }
                })
                ->latest()
                ->paginate(paginateCount());
        }

        return view('backend.user.appointments', compact('appointments'));
    }

    public function times() {
        $carbon = now('Asia/Dhaka')->subDays(4)->locale('en_BD');
        $dates = [];
        for ($i = 1; $i <= 7; ++$i) {
            $date = $carbon->addDay();
            $dates[$date->format('l')] = AppointmentTime::where('user_id', auth()->id())->where('day', $date->format('l'))->first()->times ?? [];
        }

        return view('backend.user.appointment-times', compact('dates'));
    }

    public function timesUpdate(Request $request) {
        AppointmentTime::where('user_id', auth()->id())->delete();
        foreach ($request->times as $day => $times) {
            AppointmentTime::create([
                'user_id' => auth()->id(),
                'day' => $day,
                'times' => $times,
            ]);
        }
        $alert = [
            'alert-type' => 'success',
            'message' => 'Updated Successfully!',
        ];

        return back()->with($alert);
    }

    public function timeDelete(AppointmentTime $time) {
        $time->delete();
        $alert = [
            'alert-type' => 'success',
            'message' => 'Deleted Successfully!',
        ];

        return back()->with($alert);
    }

    public function approvedList() {
        /**
         * @var ?ExpertProfile $expert
         */
        $expert = auth()->user()->expertProfile;
        if ($expert) {
            $appointments = $expert->appointments()
                    ->approvedOnly()
                    ->with('map', 'user')
                    ->where(function(Builder $builder){
                        if (request('map_id')) {
                            $builder->where('map_id', request('map_id'));
                        }
                    })
                    ->latest()
                    ->paginate(paginateCount());
        } else {
            $appointments = UserAppointment::approvedOnly()
                ->with('map', 'user')
                ->where(function(Builder $builder){
                    if (request('map_id')) {
                        $builder->where('map_id', request('map_id'));
                    }
                    if (request('consultation')) {
                        $builder->whereNotNull('expert_profile_id');
                    } else{
                        $builder->whereNull('expert_profile_id');
                    }
                })
                ->latest()
                ->paginate(paginateCount());
        }

        return view('backend.user.appointmentsApproved', compact('appointments'));
    }

    public function completedList() {
        /**
         * @var ?ExpertProfile $expert
         */
        $expert = auth()->user()->expertProfile;
        if ($expert) {
            $appointments = $expert->appointments()
                    ->completedOnly()
                    ->with('map', 'user')
                    ->where(function(Builder $builder){
                        if (request('map_id')) {
                            $builder->where('map_id', request('map_id'));
                        }
                    })
                    ->latest()
                    ->paginate(paginateCount());
        } else {
            $appointments = UserAppointment::completedOnly()
                ->with('map', 'user')
                ->where(function(Builder $builder){
                    if (request('map_id')) {
                        $builder->where('map_id', request('map_id'));
                    }
                    if (request('consultation')) {
                        $builder->whereNotNull('expert_profile_id');
                    } else{
                        $builder->whereNull('expert_profile_id');
                    }
                })
                ->latest()
                ->paginate(paginateCount());
        }

        return view('backend.user.appointmentsCompleted', compact('appointments'));
    }

    public function approve(int $id) {
        $appointment = UserAppointment::find($id);
        if (null != $appointment->expert_profile_id) {
            $expert = auth()->user()->expertProfile;
            if (null != $expert && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!',
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
        try {
            Notification::route('mail', $appointment->email)->notify(new AppointmentApprovedNotification($appointment));
        } catch (Throwable $th) {
            Log::error($th->getMessage());
        }
        $alert = [
            'message' => 'Appointment Approved',
            'alert-type' => 'success',
        ];

        return back()->with($alert);
    }

    public function complete(int $id) {
        $appointment = UserAppointment::find($id);
        if (null != $appointment->expert_profile_id) {
            $expert = auth()->user()->expertProfile;
            if (null != $expert && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!',
                ]);
            }
        }
        $appointment->is_completed = true;
        $appointment->completed_at = now();
        $appointment->update();
        dd($appointment->refresh());
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

    public function destroy(int $id) {
        $appointment = UserAppointment::find($id);
        if (null != $appointment->expert_profile_id) {
            $expert = auth()->user()->expertProfile;
            if (null != $expert && $appointment->expert_profile_id != $expert->id) {
                return back()->with([
                    'alert-type' => 'warning',
                    'message' => 'This consultation does not belong to you!',
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
