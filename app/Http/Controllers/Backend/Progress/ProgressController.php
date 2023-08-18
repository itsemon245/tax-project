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
use Illuminate\Support\Facades\DB;

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
        $users = User::inRandomOrder()->limit(6)->get();
        return view('backend.progress.createProjectProgress', compact('clients', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'weekdays' => 'required',
            'daily_target' => 'numeric|required',
            'total_clients' => 'required|numeric'
        ]);

        $project = Project::create($data);
        $project->weekly_target = $request->daily_target * $data['weekdays'];
        $project->monthly_target = $request->daily_target * $data['weekdays'] * 4;
        $project->save();
        foreach ($request->clients as $clientId) {
            $project->clients()->attach($clientId);
            $users = $request["client_" . $clientId . "_users"];
            foreach ($users as $userId) {
                DB::table('client_user')->insert([
                    'client_id' => $clientId,
                    'user_id' => $userId
                ]);
            }
        }
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
