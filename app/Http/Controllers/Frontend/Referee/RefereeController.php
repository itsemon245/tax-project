<?php

namespace App\Http\Controllers\Frontend\Referee;

use App\Models\User;
use App\Models\Referee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRefereeRequest;
use App\Http\Requests\UpdateRefereeRequest;

class RefereeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referees = User::with('referees')->find(auth()->id(), ['id'])->referees;
        return view('frontend.pages.referee.refer-index', compact('referees'));
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
    public function store(StoreRefereeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Referee $referee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referee $referee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRefereeRequest $request, Referee $referee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referee $referee)
    {
        //
    }
}
