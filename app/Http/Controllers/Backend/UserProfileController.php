<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        //
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
        if ($request->has('old_password')) {
            $userData = User::findOrFail($id); 
            $oldPassword = $request->old_password;
            if (Hash::check( $oldPassword, $userData->password)) {
                $userData->password = $request->new_password;
                $userData->save();
                return redirect()->back()->with('success', 'Password Update Successful.');
            } else {
                return redirect()->back()->with('danger', 'Something is wrong.');
            }
            
        } else {
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
            return redirect()->back()->with($notification);
        }
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
