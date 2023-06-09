<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Info;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceSubCategory;
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
        $subCategories = ServiceSubCategory::with('serviceCategory')->where('service_category_id', 3)->get();
        return view('frontend.pages.industries.industries', compact('subCategories'));
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
    public function becomePartnerPage()
    {
        $user = Auth::user();
        return view('frontend.pages.becomePartner', compact('user'));
    }
}
