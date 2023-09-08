<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use App\Models\Project;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /*
    * create dashboard view page
    */
    public function index()
    {
        $clients = Client::simplePaginate(paginateCount());
        $projects = Project::simplePaginate(paginateCount());
        $events = Calendar::with('client')->latest()->simplePaginate(paginateCount());
        $today = Carbon::now()->format('Y-m-d');
        $services = Calendar::get()->unique();
        $currentEvents = Calendar::where('start', 'like', "$today%")->latest()->get();
        $currentTime = Carbon::now();
        return view('backend.dashboard.dashboard', compact('clients', 'projects', 'events', 'today', 'services', 'currentEvents', 'currentTime'));
    }
}
