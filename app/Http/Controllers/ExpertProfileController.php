<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpertProfileRequest;
use App\Http\Requests\UpdateExpertProfileRequest;
use App\Models\ExpertProfile;

class ExpertProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = ExpertProfile::all();
        return view("backend.expertProfile.viewExpertProfile", compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.expertProfile.createExpertProfile");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpertProfileRequest $request)
    {
        $request->validated();
        $expert = ExpertProfile::create($request->except('image'));
        $expert->image = saveImage($request->image, 'experts');
        $expert->save();

        return redirect()
            ->route("expert-profile.index")
            ->with(array(
                'message'    => "Expert Profile Created Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpertProfile $expertProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpertProfile $expertProfile)
    {
        $profile = ExpertProfile::find($expertProfile->id);
        return view("backend.expertProfile.editExpertProfile", compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpertProfileRequest $request, ExpertProfile $expertProfile)
    {
        $request->validated();
        $expertProfile->update($request->except('image'));
        if ($request->has('image')) {
            $expertProfile->image = updateFile($request->image, $expertProfile->image, 'experts');
            $expertProfile->save();
        }

        return redirect()
            ->route("expert-profile.index")
            ->with(array(
                'message'    => "Expert Profile Updated Successfully",
                'alert-type' => 'success',
            ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpertProfile $expertProfile)
    {
        ExpertProfile::find($expertProfile->id)->delete();
        return back()
            ->with(array(
                'message'    => "Expert Profile Deleted Successfully",
                'alert-type' => 'success',
            ));
    }
}
