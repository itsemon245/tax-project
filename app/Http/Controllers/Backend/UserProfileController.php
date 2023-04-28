<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\UserProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserProfileUpdateRequest $request, $id)
    {
        $userData = User::findOrFail($id);
        $userData->name = $request->name;
        $userData->user_name = $request->user_name;
        $userData->phone = $request->phone;
        if ($request->hasFile('profile_img')) {
            $path = "public/" . $userData->image_url;
            $userData->image_url = $this->saveImage($request->profile_img);
            if (Storage::exists($path)) {
                $deleted = Storage::delete($path);
            }
        }
        $userData->save();

        return redirect()
            ->back()
            ->with('success', 'Profile Updated');
    }

    // save image
    /**
     * Stores an image given a request
     * @return string
     */
    public function saveImage($image)
    {
        $ext = $image->extension();
        $name = 'user-image-' . uniqid() . '.' . $ext;
        $path = $image->storeAs('uploads/profile', $name, 'public');
        return $path;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
