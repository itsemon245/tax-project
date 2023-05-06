<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        $appointmentSections = Appointment::get();
        return view('frontend.pages.welcome', compact('banners', 'appointmentSections'));
    }
}
