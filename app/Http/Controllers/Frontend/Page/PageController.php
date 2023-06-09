<?php

namespace App\Http\Controllers\Frontend\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function trainingPage()
    {
        return view('frontend.pages.training');
    }
    public function industriesPage()
    {
        return view('frontend.pages.industries.industries');
    }
    public function clientStudioPage()
    {
        return view('frontend.pages.clientStudio.clientStudio');
    }
    public function appointmentPage()
    {
        return view('frontend.pages.appointment.create-appointment');
    }
    public function aboutPage()
    {
        return view('frontend.pages.about');
    }
    public function becomePartnerPage()
    {
        $user = Auth::user();
        return view('frontend.pages.becomePartner', compact('user'));
    }
}
