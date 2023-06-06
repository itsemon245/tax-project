<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Info;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function appointmentPage(bool $isPhysical)
    {
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $testimonials = Testimonial::get();
        return view('frontend.pages.appointment.makeAppointment', compact('banners','infos1','testimonials', 'isPhysical'));
    }
    public function aboutPage()
    {
        return view('frontend.pages.about');
    }
}
