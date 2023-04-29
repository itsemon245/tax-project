<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /*
    * create dashboard view page
    */
    public function index()
    {
        return view('backend.dashboard.dashboard');
    }
}
