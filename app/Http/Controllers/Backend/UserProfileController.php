<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\backend\UserProfileUpdateRequest;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $user = Auth::user();
            return view('backend.profile.profile-edit', compact('user'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('frontend.profile.profile-edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = Auth::user();
        return view('backend.profile.changePassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileUpdateRequest $request, $id)
    {
        // dd($request->all());
            $userData = User::findOrFail($id);
            $userData->name = $request->name;
            $userData->email = $request->email;
            $userData->user_name = $request->user_name;
            $userData->phone = $request->phone;
            $old_path = $userData->image_url;
            $userData->image_url = updateFile($request->profile_img, $old_path,'profile','user-image');
            $userData->save();
    
            $notification = array(
                'message' => "Profile Updated",
                'alert-type' => 'success',
            );
            return back()->with($notification);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * Change Profile Password.
     */
    public function changePassword(Request $request)
    {
            $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_new_password' => 'required|string|same:new_password',

            ]);
        
        $user = User::findOrFail(auth()->id());
        $isValid = Hash::check($request->old_password, $user->password);
        $notification = array(
            'message' => "Password Changed Successfully",
            'alert-type' => 'success',
        );
        if ($isValid) {
                $user->password = Hash::make($request->confirm_new_password);
                $user->save();
            } else {
                $notification = array(
                    'message' => "Password Didn't Match",
                    'alert-type' => 'danger',
                );
            }
            return back()->with($notification);
    }

}
