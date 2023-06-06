<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.pages.becomePartner');
    }
}
