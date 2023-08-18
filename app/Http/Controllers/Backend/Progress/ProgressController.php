<?php

namespace App\Http\Controllers\Backend\Progress;

use App\Models\Progress;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Client;
use App\Models\User;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.progress.viewAllProgress');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('users')->get();
        $users = User::limit(5)->get();
        return view('backend.progress.createProjectProgress', compact('clients', 'users'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(StoreProgressRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Progress $progress)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Progress $progress)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(UpdateProgressRequest $request, Progress $progress)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Progress $progress)
    // {
    //     //
    // }
}
