<?php

namespace App\Http\Controllers\Backend;

use App\Models\Client;
use App\Models\Expense;
use App\Models\Project;
use App\Models\Calendar;
use App\Http\Controllers\Controller;
use App\Models\FiscalYear;
use App\Models\Purchase;
use App\Models\UserAppointment;
use App\Models\UserDoc;
use App\Models\Withdrawal;
use Carbon\Carbon;

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
        $statReports = $this->getStatReports();
        $expertStats = [];
        $recentConsultations = null;

        if (auth()->user()->role_name == 'expert') {
            $expertProfile = auth()->user()->expertProfile;
            $recentConsultations = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->latest()
            ->limit(10)
            ->paginate();
            $expertStats['Today'] = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->whereDate('created_at', now())
            ->count();
            $expertStats['This week'] = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->whereBetween('created_at', [
                now()->subWeek()->startOf('week'),
                now()->startOf('week')
                ])
            ->count();
            $expertStats['This month'] = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->whereBetween('created_at', [
                now()->subMonth()->startOf('month'),
                now()->startOf('month')
                ])
            ->count();
            $expertStats['This year'] = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->whereBetween('created_at', [
                now()->subYear()->startOf('year'),
                now()->startOf('year')
                ])
            ->count();
            $expertStats['All time'] = UserAppointment::where('expert_profile_id', $expertProfile->id)
            ->count();
        }
        $fiscalYear = FiscalYear::where('year', currentFiscalYear())->first();
        $chartData = $this->getChartData();
        $events = Calendar::with('client')->latest()->latest()->get();
        $today = today('Asia/Dhaka')->format('Y-m-d');
        $clients = Client::get();
        $services = Calendar::select('service')->distinct()->latest()->get();
        $currentEvents = Calendar::where('start', 'like', "$today%")
        ->whereNotNull('rejected_at')
        ->whereNotNull('completed_at')
        ->latest()->get()->groupBy('type');
        $projects = Project::get();
        $totalExpense = Expense::where('type', 'debit')->sum('amount');
        $todaysExpense = Expense::where([
            'date' => today()->format('Y-m-d'),
            'type' => 'debit'
        ])->first();
        $expenses = (object)[
            'total' => $totalExpense,
            'today' => $todaysExpense?->amount ?? 0
        ];
        return view('backend.dashboard.dashboard', compact('statReports', 'expertStats', 'recentConsultations', 'clients', 'expenses', 'events', 'today', 'services', 'currentEvents', 'fiscalYear', 'chartData', 'projects'));
    }

    protected function getStatReports(): array
    {
        $statReports = [];
        $filters = [
            'daily',
            'weekly',
            'monthly',
            'total'
        ];
        foreach ($filters as $filter) {
            switch ($filter) {
                case 'total':
                    $dateFrom = null;
                    $dateTo = null;
                    break;
                case 'monthly':
                    $dateFrom = Carbon::createFromDate(now()->year, now()->month, 1, 'Asia/Dhaka');
                    $dateTo = Carbon::createFromDate(now()->year, now()->month, now()->daysInMonth, 'Asia/Dhaka');
                    break;
                case 'weekly':
                    $dateFrom = Carbon::createFromDate(now()->year, now()->month, now()->getWeekStartsAt(), 'Asia/Dhaka');
                    $dateTo = Carbon::createFromDate(now()->year, now()->month, now()->getWeekEndsAt(), 'Asia/Dhaka');
                    break;

                default:
                    $dateFrom = today();
                    $dateTo = today();
                    break;
            }
            if ($dateFrom && $dateTo) {
                $dateFrom = $dateFrom->format('Y-m-d');
                $dateTo = $dateTo->format('Y-m-d');
            }
            $statReports[$filter] = [
                'client accounts' => [
                    'total' => Client::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => '-',
                    'pending' => '-',
                ],
                'service' => [
                    'total' => Purchase::wherePurchasableType('Service')
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => Purchase::wherePurchasableType('Service')
                    ->whereApproved(1)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => Purchase::wherePurchasableType('Service')
                    ->whereApproved(0)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'course' => [
                    'total' => Purchase::wherePurchasableType('Course')
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => Purchase::wherePurchasableType('Course')
                    ->whereApproved(1)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => Purchase::wherePurchasableType('Course')
                    ->whereApproved(0)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'product' => [
                    'total' => Purchase::wherePurchasableType('Product')
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => Purchase::wherePurchasableType('Product')
                    ->whereApproved(1)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => Purchase::wherePurchasableType('Product')
                    ->whereApproved(0)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'appointment' => [
                    'total' => UserAppointment::whereNull('expert_profile_id')
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => UserAppointment::whereNull('expert_profile_id')
                    ->whereIsCompleted(1)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => UserAppointment::whereNull('expert_profile_id')
                    ->whereIsCompleted(0)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'expert appointment' => [
                    'total' => UserAppointment::whereNotNull('expert_profile_id')
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => UserAppointment::whereNotNull('expert_profile_id')
                    ->whereIsCompleted(1)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => UserAppointment::whereNotNull('expert_profile_id')
                    ->whereIsCompleted(0)
                    ->where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'document uploads' => [
                    'total' => UserDoc::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'completed' => UserDoc::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                    'pending' => UserDoc::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count(),
                ],
                'withdrawal requests' => [
                    'total' => Withdrawal::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->count('amount'). ".00 &#2547",
                    'completed' => Withdrawal::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->whereStatus(1)
                    ->count('amount'). ".00 &#2547",
                    'pending' => Withdrawal::where(function ($q) use ($dateFrom, $dateTo) {
                        if ($dateFrom && $dateTo) {
                            $q->whereDate('created_at', '>=', $dateFrom);
                            $q->whereDate('created_at', '<=', $dateTo);
                        }
                    })
                    ->whereStatus(0)
                    ->count('amount'). ".00 &#2547",
                ],
            ];
        }

        return $statReports;
    }

    public function getChartData()
    {
        $fiscalYears = FiscalYear::orderBy('year', 'desc')->latest()->latest()->take(3)->get();

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
