<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\backend\UserProfileUpdateRequest;
use App\Models\Authentication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        $data = Authentication::where('user_id', $user->id)->first();

        return view('backend.profile.profile-edit', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $user = Auth::user();

        return view('frontend.profile.profile-edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $user = Auth::user();

        return view('backend.profile.changePassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileUpdateRequest $request, $id) {
        $user = User::find(auth()->id());
        $user->update($request->except('avatar'));
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        if ($request->hasFile('avatar')) {
            $user->image_url = updateFile($request->avatar, $user->image_url, 'profile', $request->user_name);
        }
        $user->save();

        $notification = [
            'message' => 'Profile Updated',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
    }

    /**
     * Change Profile Password.
     */
    public function changePassword(Request $request) {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_new_password' => 'required|string|same:new_password',
        ]);

        $user = User::findOrFail(auth()->id());
        $isValid = Hash::check($request->old_password, $user->password);
        $notification = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        ];
        if ($isValid) {
            $user->password = Hash::make($request->confirm_new_password);
            $user->save();
        } else {
            $notification = [
                'message' => "Password Didn't Match",
                'alert-type' => 'danger',
            ];
        }

        return back()->with($notification);
    }

    // User profile to become a partner profile method
    public function userToBecomePartner(Request $request, $id) {
        // $request->validate([
        //     'name' => 'required|string',
        //     'phone' => 'required|string|max:11|min:11',
        //     'division' => 'required',
        //     'district' => 'required',
        //     'thana' => 'required',
        //     'address' => 'required|max:400|min:150',

        // ]);
        $userData = User::findOrFail($id);
        $userData->name = $request->name;
        $userData->phone = $request->phone;
        $userData->division = $request->division;
        $userData->district = $request->district;
        $userData->thana = $request->thana;
        $userData->address = $request->address;
        $userData->update();
        $notification = [
            'message' => 'Profile Updated',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }
}
