<?php

namespace App\Http\Controllers\Backend\Progress;

use App\Models\User;
use App\Models\Client;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Project;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'weekdays' => 'required',
            'daily_target' => 'numeric|required',
            'total_clients' => 'required|numeric'
        ]);
        $store = new Project();
        $store->name = $request->name;
        $store->start_date = $request->start_date;
        $store->end_date = $request->end_date;
        $store->weekdays = $request->weekdays;
        $store->daily_target = $request->daily_target;
        $store->total_clients = $request->total_clients;
        $store->weekly_target = $request->daily_target * 7;
        $store->monthly_target = $request->daily_target * 30;
        $store->save();
        $notification = [
            'message' => 'Project Created With Assigned',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

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
