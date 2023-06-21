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
        $data = (object) $request->validated();
        ExpertProfile::create(
            [
                'name'          => $data->name,
                'post'          => $data->post,
                'bio'           => $request->bio,
                'image'         => saveImage($data->image, 'expertProfile', 'expertProfile'),
                'experience'    => $data->experience,
                'join_date'     => $data->join_date,
                'availability'  => $data->availability,
                'at_a_glance'   => $request->at_a_glance,
                'description'   => $data->description,
            ]
        );

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
        $data = (object) $request->validated();
        $body = [
            'name'          => $data->name,
            'post'          => $data->post,
            'bio'           => $request->bio,
            'experience'    => $data->experience,
            'join_date'     => $data->join_date,
            'availability'  => $data->availability,
            'at_a_glance'   => $request->at_a_glance,
            'description'   => $data->description,
        ];
        if (isset($data->image) && !empty($data->image)) {
            $body['image'] = saveImage($data->image, 'expertProfile', 'expertProfile');
        }

        ExpertProfile::find($expertProfile->id)
            ->update($body);

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
