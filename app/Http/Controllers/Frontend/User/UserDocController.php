<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\UserDoc;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserDocRequest;
use App\Http\Requests\UpdateUserDocRequest;

class UserDocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.userdoc.uploadDoc');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDocRequest $request)
    {
        dd($request->gallery_images);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDoc $userDoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDoc $userDoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDocRequest $request, UserDoc $userDoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDoc $userDoc)
    {
        //
    }
}
