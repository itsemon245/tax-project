<?php

namespace App\Http\Controllers\Backend\PartnerSection;

use App\Models\PartnerSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerSectionRequest;
use App\Http\Requests\UpdatePartnerSectionRequest;
use App\Models\PartnerRequest;

class PartnerSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnerSection = PartnerSection::paginate(paginateCount());
        return view('backend.partnerSection.aboutUsPartnerSection', compact('partnerSection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $partnersRequest = PartnerRequest::where('status', 0)->latest()->get();
        return view('backend.partnerSection.partnerRequest' ,compact('partnersRequest'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerSectionRequest $request)
    {
        $partnerSection = new PartnerSection();
        $partnerSection->name = $request->name;
        $partnerSection->designation = $request->designation;
        $partnerSection->email = $request->email;
        $partnerSection->phone = $request->phone;
        $partnerSection->facebook = $request->facebook;
        $partnerSection->twitter = $request->twitter;
        $partnerSection->linkedin = $request->linkedin;
        $partnerSection->image = saveImage($request->image, 'pages', 'partner-image');
        $partnerSection->save();
        $notification = array(
            'message' => "Updated Successfully",
            'alert-type' => 'Success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(PartnerSection $partnerSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PartnerSection $partnerSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerSectionRequest $request, PartnerSection $partnerSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PartnerSection $partnerSection)
    {
        $partnerSection->delete();
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }
}
