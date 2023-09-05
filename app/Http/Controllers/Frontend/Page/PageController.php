<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Map;
use App\Models\Info;
use App\Models\User;
use App\Models\About;
use App\Models\Industry;
use App\Models\Testimonial;
use App\Models\ClientStudio;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
    function officePage()
    {
        $maps = Map::get();
        return view('frontend.pages.office', compact('maps'));
    }
    function contactPage()
    {
        $maps = Map::get();
        return view('frontend.pages.contact', compact('maps'));
    }
    public function becomePartnerPage()
    {
        $user = auth()->user();
        return view('frontend.pages.becomePartner', compact('user'));
    }

    //promo codes view page
    public function PromoCodePage()
    {
        $user_id = Auth::user()->id;
        $promoCodes = User::find($user_id)->promoCodes()->where('status', 1)->get();
        return view('frontend.pages.promoCodesPage', compact('promoCodes'));
    }

    //notification client side view page
    public function notificationPage()
    {
        return view('frontend.pages.notificationPage');
    }

    
    //show all my courses in frontend
    public function myCourses()
    {
        $user = User::where('id', auth()->id())->first();
        $courses = $user->purchased('course');
        return view('frontend.pages.myCourses', compact('courses'));
    }
    //show all my payments/payment history in frontend
    public function myPayments()
    {
        $payments = User::find(auth()->id())->purchases;
        return view('frontend.pages.myPayments', compact('payments'));
    }
}
