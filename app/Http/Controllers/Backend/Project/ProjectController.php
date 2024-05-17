<?php

namespace App\Http\Controllers\Backend\Project;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProgressRequest;
use App\Http\Requests\UpdateProgressRequest;

class ProjectController extends Controller
{
    public $employees;

    public function __construct()
    {
        $this->middleware('can:read progress', [
            'only' => ['index', 'projectClients', 'show']
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
        $this->middleware('can:assign client',  [
            'only' => ['assign', 'assigned']
        ]);
        $this->middleware('can:update task progress',  [
            'only' => ['projectClients', 'updateTask']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $clients = Client::latest()->latest()->paginate(paginateCount());
        $projects = Project::with('tasks')->latest()->latest()->paginate(paginateCount());
        return view('backend.project.viewAllProjectProgress', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function projectClients($id)
    {

        $project = Project::with('tasks', 'tasks.clients')->find($id);
        $clients = User::find(auth()->id())->clients()->with('users:id,name')->latest()->paginate(paginateCount(100));
        return view('backend.project.projectClients', compact('project', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::with('users:name,id')->latest()->get(['id', 'name', 'phone', 'circle', 'zone']);
        if ($clients->count() == 0) {
            return back()->with([
                'alert-type' => 'warning',
                'message'=> 'You need at least 1 client to make a project!'
            ]);
        }
        //!TODO: change random user to a specific role
        $users = User::inRandomOrder()->limit(6)->latest()->get();
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
            'daily_target' => 'numeric|required|min:1',
            'total_clients' => 'required|numeric',
        ]);
        $super_admins = Role::Where('name', 'super admin')->first()->users;
        $admins = Role::Where('name', 'admin')->first()->users;
        $weekly_target = $request->daily_target * $data['weekdays'];
        $monthly_target = $request->daily_target * $data['weekdays'] * 4;
        $project = Project::create($data);
        $clients = Client::with('users')->latest()->get();


        // Create tasks for each project
        $tasks = [];
        foreach ($request->tasks as $task) {
            $task = Task::create([
                'name' => $task,
                'project_id' => $project->id,
            ]);
            $tasks[] = $task;
        }

        foreach ($clients as $client) {
            // Attaching Tasks to project
            foreach ($tasks as $task) {
                $task->clients()->attach($client->id);
            }
            // Attaching Clients with project
            $project->clients()->attach($client->id);
            if ($super_admins->count() > 0) {
                foreach ($super_admins as $admin) {
                    $client->users()->attach($admin->id, [
                        'project_id' => $project->id
                    ]);
                }
            }
            if ($admins->count() > 0) {
                foreach ($admins as $admin) {
                    $client->users()->attach($admin->id, [
                        'project_id' => $project->id
                    ]);
                }
            }
        }

        // Assign Targets
        $project->daily_target = $request->daily_target < $project->total_clients ? $request->daily_target : $project->total_clients;
        $project->weekly_target = $weekly_target < $project->total_clients ? $weekly_target : $project->total_clients;
        $project->monthly_target = $monthly_target < $project->total_clients ? $monthly_target : $project->total_clients;
        $project->save();




        $notification = [
            'message' => 'Project Created',
            'alert-type' => 'success',
        ];
        return redirect(route('project.index'))
            ->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = Project::with('tasks')->find($id);
        $clients = Client::with('users')->latest()->get();
        return view('backend.project.editProjectProgress', compact('project', 'clients'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:projects,name,' . $id,
            'start_date' => 'date|required',
            'end_date' => 'date|required',
            'weekdays' => 'required|numeric',
            'daily_target' => 'numeric|required',
            'total_clients' => 'required|numeric',
        ]);
        $project = Project::find($id);
        $project->update($data);
        $project->weekly_target = $request->daily_target * $data['weekdays'];
        $project->monthly_target = $request->daily_target * $data['weekdays'] * 4;
        $project->save();
        $project->tasks()->delete();
        foreach ($request->tasks as $task) {
            Task::create([
                    'name' => $task, 'project_id' => $project->id
                ]);
        }
        $notification = [
            'message' => 'Project Updated',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    function updateTask(int $project, int $client, int $task): JsonResponse
    {
        try {
            $task = Task::find($task);
            $client = Client::find($client);
            if ($task->isCompleted($client->id)) {
                $allCompleted = $client->tasks($project)->wherePivot('is_completed', true)->count() === $client->tasks($project)->count();
                $project = Project::find($project);
                if ($allCompleted) {
                    $project->daily_progress = $project->daily_progress > 0 ? $project->daily_progress - 1 : 0;
                    $project->save();
                }
                $task->clients()->updateExistingPivot($client->id, [
                    'is_completed' => false
                ]);
            } else {
                $task->clients()->updateExistingPivot($client->id, [
                    'is_completed' => true
                ]);
                $allCompleted = $client->tasks($project)->wherePivot('is_completed', true)->count() === $client->tasks($project)->count();
                $project = Project::find($project);

                if ($allCompleted) {
                    $project->daily_progress = $project->daily_progress + 1;
                    $project->save();
                    DB::table('client_project')->where(['project_id' => $project->id, 'client_id' => $client->id])->update(['is_completed' => true]);
                } else {
                    DB::table('client_project')->where(['project_id' => $project->id, 'client_id' => $client->id])->update(['is_completed' => false]);
                }
            }
            $success = true;
            $message = 'Task Updated!';
        } catch (\Throwable $th) {
            $success = false;
            $message = $th->getMessage();
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
            'completedAll' => $allCompleted
        ]);
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroyProjectClient($project, $client)
    {
        DB::table('client_project')->where(['client_id' => $client, 'project_id' => $project])->delete();
        $notification = [
            'message' => 'Project Client Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    public function assign($id)
    {
        $project = Project::find($id);
        $clients = $project->clients()->with('users:name,id')->latest()->paginate(100);
        $employees = Role::where('name', 'employee')->first()->users;
        return view('backend.project.assignClientsproject', compact('project', 'clients', 'employees'));
    }

    public function assigned(Request $request, int $client, int $user, int  $project)
    {
        $options = [
            'client_id' => $client,
            'user_id' => $user,
            'project_id' => $project,
        ];
        $success = true;
        $query = DB::table('client_user')
            ->where($options);
        $isAssigned = $query->first() !== null;
        if ($isAssigned) {
            $query->delete();
            $message = 'Removed from project';
        } else {
            DB::table('client_user')->insert($options);
            $message = 'Added to project';
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
