<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Achievement::latest()->get();
        return view('backend.achievment.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.achievment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchievementRequest $request)
    {
        $appointmentStore = new Achievement();
        $appointmentStore->image = saveImage($request->image, 'achievements');
        $appointmentStore->user = $request->user;
        $appointmentStore->total_user = $request->total_user;
        $appointmentStore->save();
        $notification = [
            'message' => 'Achievements Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        return view('backend.achievment.edit', compact('achievement'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchievementRequest $request, Achievement $achievement)
    {
        if($request->hasFile('image'))
        {
            $achievement->image = updateFile($request->image, $achievement->image ,'achievements');
        }
        $achievement->user = $request->user;
        $achievement->total_user = $request->total_user;
        $achievement->save();
        $notification = [
            'message' => 'Achievements Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        deleteFile($achievement->image);
        $achievement->delete();
        $notification = [
            'message' => 'Achievements Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
