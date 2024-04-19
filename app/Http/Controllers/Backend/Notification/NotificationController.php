<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Models\User;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AnnouncementNotification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = DB::table('notifications')
        ->join('users', 'notifications.notifiable_id', '=', 'users.id')
        ->where('data->type', 'announcement')
        ->select('notifications.*', 'users.name as user_name', 'users.email as user_email')
        ->get();
        // dd($notifications);
        return view('backend.notification.view', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required',
            'message' => 'required'
        ]);

        $users = [];
        // Replace with the user you want to notify
        switch ($request->user_type) {
            case 'all':
                $users = User::whereNotNull('email_verified_at')->get();
                break;
            case 'partner':
                $users = User::role('partner')->whereNotNull('email_verified_at')->get();
                break;
            case 'user':
                $users = User::role('user')->whereNotNull('email_verified_at')->get();
                break;
            case 'individual':
                $users = User::where('id', $request->user_id)->whereNotNull('email_verified_at')->get();
                break;

            default:
                return back()->with([
                    'alert-type' => 'error',
                    'message' => 'Invalid User Type'
                ]);

                break;
        }

        Notification::send($users, new AnnouncementNotification($request->message));
        return redirect(route('notification.index'))->with([
            'alert-type' => 'success',
            'message' => 'Announcement Sent Successfully!'
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
