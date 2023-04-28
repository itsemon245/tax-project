<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function update(Request $request, $id)
    {
        $userData = User::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:11', 'min:11'],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

            
        ]);
        if ($request->hasFile('profile_img')) {
            $image_explode = explode('/', $userData->image_url);
            $old_img_name = end($image_explode);
            $path = 'profile/' . $old_img_name;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $saveImage = $this->saveImage($request);
            $userData->name = $request->name;
            $userData->user_name = $request->user_name;
            $userData->phone = $request->phone;
            $userData->image_url = $saveImage['image_url'];
            $userData->save();
            $notification = [
                'message' => 'Profile Successfully Updated',
                'alert-type' => 'success',
            ];
            return redirect()
                ->back()
                ->with($notification);
        } else {
            $userData->name = $request->name;
            $userData->user_name = $request->user_name;
            $userData->phone = $request->phone;
            $userData->save();
            $notification = [
                'message' => 'Profile Successfully Updated',
                'alert-type' => 'success',
            ];
            return redirect()
                ->back()
                ->with($notification);
        }
    }

        // save image
        public function saveImage($request)
        {
            $ext = $request->profile_img->extension();
            $name = 'Profile-' . uniqid() . '.' . $ext;
            $save = $request->profile_img->storeAs('profile', $name, 'public');
            $saveUrl = config('app.url') . '/storage/' . $save;
            return ['name' => $name, 'image_url' => $saveUrl];
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
