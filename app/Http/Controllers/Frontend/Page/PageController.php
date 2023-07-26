<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Map;
use App\Models\Info;
use App\Models\User;
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
    public function appointmentPage()
    {
        $maps = Map::get();
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $testimonials = Testimonial::get();
        return view('frontend.pages.appointment.makeAppointment', compact('banners', 'infos1', 'testimonials', 'maps'));
    }
    public function appointmentVirtual()
    {
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $testimonials = Testimonial::get();
        return view('frontend.pages.appointment.makeAppointmentVirtual', compact('banners', 'infos1', 'testimonials'));
    }
    public function aboutPage()
    {
        $about_data = About::skip(0)->first();
        if($about_data > 0){
            $about_sections = json_decode($about_data->sections, true);
            return view('frontend.pages.about', compact('about_data', 'about_sections'));
        }else{
            $about_sections=null;
            return view('frontend.pages.about', compact('about_data', 'about_sections'));
        }
    }
    function officePage() {
        $maps = Map::get();
        return view('frontend.pages.office', compact('maps'));
    }
    function contactPage() {
        $maps = Map::get();
        return view('frontend.pages.contact', compact('maps'));
    }
    public function becomePartnerPage()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('backend.auth.login');
        } else {
            return view('frontend.pages.becomePartner', compact('user'));
        }
    }

    //promo codes view page
    public function PromoCodePage()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user_id == null) {
            return view('backend.auth.login');
        } else {
            return view('frontend.pages.promoCodesPage', compact('user'));
        }   
    }
}
