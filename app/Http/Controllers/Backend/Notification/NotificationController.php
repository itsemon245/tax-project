<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Models\User;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.notification.view');
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
            'comment' => 'required'
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
                break;
        }

        foreach ($users as $item) {
            $notifications = new Notifcation();
            $notifications->user_id = $item->id;
            $notifications->message = $request->comment;
            $notifications->save();
        }
        return view('backend.notification.create');
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
