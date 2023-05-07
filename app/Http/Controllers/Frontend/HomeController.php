<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\Info;
use App\Models\SocialHandle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        $appointmentSections = Appointment::get();
        $infos1 = Info::where('section_id', 1)->get();
        $infos2 = Info::where('section_id', 2)->get();
        $socials = SocialHandle::get();
        return view('frontend.pages.welcome', compact('banners', 'appointmentSections', 'infos1', 'infos2', 'socials'));
    }
}
