<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Info;
use App\Models\About;
use App\Models\Testimonial;
use App\Models\ClientStudio;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
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
        $data = ClientStudio::get();
        $description = $data[0]->description;

        return view('frontend.pages.clientStudio.clientStudio', compact('data', 'description'));
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
        $about_data= About::skip(0)->first();
        $about_sections= json_decode($about_data->sections,true);
        //dd($about_sections[0]['title']);
        return view('frontend.pages.about',compact('about_data','about_sections'));
    }
    public function becomePartnerPage()
    {
        $user = Auth::user();
        if($user == null){
            return view('backend.auth.login');
        }else{
            return view('frontend.pages.becomePartner', compact('user'));
        }
    }
}
