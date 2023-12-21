<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use App\Models\Project;
use App\Models\Calendar;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\FiscalYear;

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
        $fiscalYear = FiscalYear::where('year', currentFiscalYear())->first();
        $chartData = $this->getChartData();
        $events = Calendar::with('client')->latest()->get();
        $today = today('Asia/Dhaka')->format('Y-m-d');
        $clients = Client::get();
        $services = Calendar::select('service')->distinct()->get();
        $currentEvents = Calendar::where('start', 'like', "$today%")->where('is_completed', false)->latest()->get()->groupBy('type');
        $projects = Project::get();
        return view('backend.dashboard.dashboard', compact('clients', 'events', 'today', 'services', 'currentEvents', 'fiscalYear', 'chartData', 'projects'));
    }

    public function getChartData()
    {
        $fiscalYears = FiscalYear::orderBy('year', 'desc')->latest()->take(5)->get();

        $mappedItems = $fiscalYears->map(function ($fy) {
            $data = collect([
                [
                    'x' => 'Overdue',
                    'y' =>  $fy->invoices()->wherePivot('status', 'overdue')->sum('due')
                ],
                [
                    'x' => 'Paid',
                    'y' =>  $fy->invoices()->wherePivot('status', 'paid')->sum('paid')
                ],
                [
                    'x' => 'Partial (Paid)',
                    'y' =>  $fy->invoices()->wherePivot('status', 'partial')->sum('paid')
                ],
                [
                    'x' => 'Partial (Due)',
                    'y' =>  $fy->invoices()->wherePivot('status', 'partial')->sum('due')
                ],
                [
                    'x' => 'Due',
                    'y' =>  $fy->invoices()->wherePivot('status', 'due')->sum('due')
                ],
            ]);
            return [
                'name' => $fy->year,
                'data' => $data
            ];
        });
        // dd($mappedItems);

        return $mappedItems;
    }
}
