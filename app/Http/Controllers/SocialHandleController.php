<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocialHandleRequest;
use App\Http\Requests\UpdateSocialHandleRequest;
use App\Models\SocialHandle;

class SocialHandleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socials = SocialHandle::get();
        return view('backend.social.socialMedia', compact('socials'));
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
    public function store(StoreSocialHandleRequest $request)
    {
        $social = new SocialHandle();
        $social->name = $request->social;
        $social->link = $request->social_link;
        $social->save();
        return redirect()->back()->with('success','Account Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialHandle $socialHandle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialHandle $socialHandle)
    {
        $socials = SocialHandle::get();
        return view('backend.social.editSocialMedia', compact('socialHandle','socials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialHandleRequest $request, SocialHandle $socialHandle)
    {
        $socialHandle->link = $request->social_link;
        $socialHandle->save();
        return redirect()->back()->with('success','Account Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialHandle $socialHandle)
    {
        $social = SocialHandle::where()->find($socialHandle->id);
        $social->delete();
        return redirect()->back()->with('danger','Item Deleted Successfully');
    }
}
