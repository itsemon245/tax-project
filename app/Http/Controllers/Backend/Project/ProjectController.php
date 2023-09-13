<?php

namespace App\Http\Controllers\Backend\Project;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;
use App\Models\Task;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:read progress', [
            'only' => ['index', 'show']
        ]);
        $this->middleware('can:create progress',   [
            'only' => ['create', 'store']
        ]);
        $this->middleware('can:update progress',   [
            'only' => ['update', 'edit']
        ]);
        $this->middleware('can:delete progress',  [
            'only' => ['destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $clients = Client::latest()->simplePaginate(paginateCount());
        return view('backend.project.viewAllProjectProgress', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('users')->get();
        $users = User::inRandomOrder()->limit(6)->get();
        return view('backend.project.createProjectProgress', compact('clients', 'users'));
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
            'weekdays' => 'required|numeric',
            'daily_target' => 'numeric|required',
            'total_clients' => 'required|numeric',
        ]);
        $project = Project::create($data);
        $project->weekly_target = $request->daily_target * $data['weekdays'];
        $project->monthly_target = $request->daily_target * $data['weekdays'] * 4;
        $project->save();
        foreach ($request->clients as $clientId) {
            foreach ($request->tasks as $task) {
                $task = Task::create([
                    'name' => $task,
                    'project_id' => $project->id,
                ]);
                $task->clients()->attach($clientId);
            }
            $project->clients()->attach($clientId);
            $users = $request["client_" . $clientId . "_users"];
            $admins = Role::where('name', 'admin')->first()->users;
            if ($admins) {
                foreach ($admins as $admin) {
                    if ($admin->clients()->find($clientId) == null) {
                        $admin->clients()->attach($clientId);
                    }
                }
            }
            if ($users) {
                foreach ($users as $userId) {
                    $isAttached = DB::table('client_user')->where(['client_id' => $clientId, 'user_id' => $userId,])->first();
                    if (!$isAttached) {
                        DB::table('client_user')->insert([
                            'client_id' => $clientId,
                            'user_id' => $userId
                        ]);
                    }
                };
            };
        };


        $notification = [
            'message' => 'Project Created With Assigned',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $clients = Client::with('users')->get();
        return view('backend.project.editProjectProgress', compact('project', 'clients'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:projects,name',
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'weekdays' => 'required|numeric',
            'daily_target' => 'numeric|required',
            'total_clients' => 'required|numeric',
        ]);
        $project = Project::find($id);
        $project->name = $request->name;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->weekdays = $request->weekdays;
        $project->weekly_target = $request->daily_target * $request->weekdays;
        $project->monthly_target = $request->daily_target * $request->weekdays * 4;
        $project->save();
        $notification = [
            'message' => 'Project Updated',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Project::find($id)->delete();
        $notification = [
            'message' => 'Project Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Progress $progress)
    // {
    //     //
    // }


}
