<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\ExpertProfile;
use App\Models\ExpertCategory;
use App\Http\Requests\StoreExpertProfileRequest;
use App\Http\Requests\UpdateExpertProfileRequest;

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
        $expert = new ExpertProfile();
        $expert->name = $request->name;
        $expert->post = $request->post;
        $expert->bio = $request->bio;
        $expert->description = $request->description;
        $expert->district = $request->district;
        $expert->thana = $request->thana;
        $expert->map_id = $request->branch_id;
        $expert->join_date = $request->join_date;
        $expert->availability = $request->availability;
        $expert->experience = $request->experience;
        $expert->at_a_glance = $request->at_a_glance;
        $expert->image = saveImage($request->image, 'experts');
        $expert->save();


        $categoryIds = [];
        foreach ($request->categories as $category) {
            $cat = ExpertCategory::firstOrCreate(['name' => $category]);
            $categoryIds[] = $cat->id;
        }
        // attaching categories
        foreach ($categoryIds as $id) {
            $expert->expertCategories()->attach($id);
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
        $expertCategories = ExpertCategory::get();
        return view("backend.expertProfile.editExpertProfile", compact('expertProfile', 'expertCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpertProfileRequest $request, ExpertProfile $expertProfile)
    {
        $expertProfile->name = $request->name;
        $expertProfile->post = $request->post;
        $expertProfile->bio = $request->bio;
        $expertProfile->district = $request->district;
        $expertProfile->thana = $request->thana;
        $expertProfile->map_id = $request->branch_id;
        $expertProfile->description = $request->description;
        $expertProfile->experience = $request->experience;
        $expertProfile->join_date = $request->join_date;
        $expertProfile->availability = $request->availability;
        $expertProfile->at_a_glance = $request->at_a_glance;
        $expertProfile->image = $request->has('image') ? updateFile($request->image, $expertProfile->image, 'experts') : $expertProfile->image;
        $expertProfile->save();

        if ($request->categories) {
            // Detach previous categories
            $expertProfile->expertCategories()->detach();
            $categoryIds = [];
            foreach ($request->categories as $category) {
                $cat = ExpertCategory::firstOrCreate(['name' => $category]);
                $categoryIds[] = $cat->id;
            }
            // attaching new categories
            foreach ($categoryIds as $id) {
                $expertProfile->expertCategories()->attach($id);
            }
        }

        return redirect()
            ->back()
            ->with(array(
                'message'    => "Expert Profile Updated",
                'alert-type' => 'success',
            ));
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
