<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpertProfileRequest;
use App\Http\Requests\UpdateExpertProfileRequest;
use App\Models\ExpertCategory;
use App\Models\ExpertProfile;

class ExpertProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:read expert', [
            'only' => ['index', 'show']
        ]);
        $this->middleware('can:create expert',   [
            'only' => ['create', 'store']
        ]);
        $this->middleware('can:update expert',   [
            'only' => ['update', 'edit']
        ]);
        $this->middleware('can:delete expert',  [
            'only' => ['destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = ExpertProfile::simplePaginate(paginateCount());
        return view("backend.expertProfile.viewExpertProfile", compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expertCategories = ExpertCategory::get();
        return view("backend.expertProfile.createExpertProfile", compact('expertCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpertProfileRequest $request)
    {
        $request->validated();
        $expert = new ExpertProfile();
        $expert->name = $request->name;
        $expert->post = $request->post;
        $expert->bio = $request->bio;
        $expert->description = $request->description;
        $expert->experience = $request->experience;
        $expert->join_date = $request->join_date;
        $expert->availability = $request->availability;
        $expert->at_a_glance = $request->at_a_glance;
        $expert->price = $request->price;
        $expert->expert_category = json_encode($request->expert_categories);
        $expert->image = saveImage($request->image, 'experts');
        $expert->save();
        if($expert->save()){
            $fetchProfile = ExpertProfile::with('expertCategories')->orderBy('created_at', 'desc')->first();
            foreach (json_decode($expert->expert_category) as $expert_category) {
                $fetchProfile->expertCategories()->attach($expert_category); 
            }
        }
        return redirect()
            ->back()
            ->with(array(
                'message'    => "Expert Profile Created",
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
        if ($request->has('image')) {
            $expertProfile->name = $request->name;
            $expertProfile->post = $request->post;
            $expertProfile->bio = $request->bio;
            $expertProfile->description = $request->description;
            $expertProfile->experience = $request->experience;
            $expertProfile->join_date = $request->join_date;
            $expertProfile->availability = $request->availability;
            $expertProfile->at_a_glance = $request->at_a_glance;
            $expertProfile->price = $request->price;
            $expertProfile->image = updateFile($request->image, $expertProfile->image, 'experts');
            $expertProfile->save();
            return redirect()
            ->back()
            ->with(array(
                'message'    => "Expert Profile Updated",
                'alert-type' => 'success',
            ));
        }else{
            $expertProfile->name = $request->name;
            $expertProfile->post = $request->post;
            $expertProfile->bio = $request->bio;
            $expertProfile->description = $request->description;
            $expertProfile->experience = $request->experience;
            $expertProfile->join_date = $request->join_date;
            $expertProfile->availability = $request->availability;
            $expertProfile->at_a_glance = $request->at_a_glance;
            $expertProfile->price = $request->price;
            $expertProfile->save();
            return redirect()
                ->back()
                ->with(array(
                    'message'    => "Expert Profile Updated",
                    'alert-type' => 'success',
                ));
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpertProfile $expertProfile)
    {
        $expertProfile->delete();
        return back()
            ->with(array(
                'message'    => "Expert Profile Deleted",
                'alert-type' => 'success',
            ));
    }
}
