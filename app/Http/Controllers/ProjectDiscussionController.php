<?php

namespace App\Http\Controllers;

use App\Models\ProjectDiscussion;
use App\Http\Requests\StoreProjectDiscussionRequest;
use App\Http\Requests\UpdateProjectDiscussionRequest;

class ProjectDiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectDiscussions = ProjectDiscussion::get();
        return view('backend.projectDiscussion.viewProjectDiscussion', compact('projectDiscussions'));
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
    public function store(StoreProjectDiscussionRequest $request)
    {
        $projectDiscussion = new ProjectDiscussion();
        $projectDiscussion->name = $request->name;
        $projectDiscussion->email = $request->email;
        $projectDiscussion->phone = $request->phone;
        $projectDiscussion->location = $request->location;
        $projectDiscussion->message = $request->message;
        $projectDiscussion->save();

        $alert = [
            'alert-type' => 'success', 
            'message' => 'Massage Submitted'
        ];
        return back()->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectDiscussion $projectDiscussion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectDiscussion $projectDiscussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectDiscussionRequest $request, ProjectDiscussion $projectDiscussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectDiscussion $projectDiscussion)
    {
        //
    }
}
