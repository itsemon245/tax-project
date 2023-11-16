<?php


namespace App\Http\Controllers\Frontend\Page;

use App\Models\Map;
use App\Models\Info;
use App\Models\User;
use App\Models\About;
use App\Models\Course;
use App\Models\Industry;
use App\Models\Achievement;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\ClientStudio;
use Illuminate\Http\Request;
use App\Models\ExpertProfile;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\PartnerSection;
use App\Models\Review;
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
        $achievements = Achievement::latest()->get();
        $partners = PartnerSection::latest()->limit(10)->get();
        return view('frontend.pages.industries.industries', compact('subCategories', 'achievements', 'partners'));
    }
    public function clientStudioPage()
    {
        $data = ClientStudio::get();
        $description = $data[0]->description;
        $appointmentSections = Appointment::latest()->limit(5)->get();
        return view('frontend.pages.clientStudio.clientStudio', compact('data', 'description', 'appointmentSections'));
    }
    public function appointmentPage(?ExpertProfile $expertProfile = null)
    {
        $maps = Map::get();
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->get();
        return view('frontend.pages.appointment.makeAppointment', compact('banners', 'expertProfile', 'infos1','testimonials', 'maps'));
    }
    public function appointmentVirtual(?ExpertProfile $expertProfile = null)
    {
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->get();
        return view('frontend.pages.appointment.makeAppointmentVirtual', compact('banners', 'expertProfile','testimonials', 'infos1'));
    }
    public function aboutPage()
    {
        $about = About::first();
        $appointmentSections = Appointment::latest()->limit(5)->get();
        return view('frontend.pages.about', compact('about', 'appointmentSections'));
    }
    function officePage()
    {
        $maps = Map::get();
        $districts = Map::select('district')->distinct()->get()->pluck('district');
        $thanas = Map::select('thana')->distinct()->get()->pluck('thana');
        return view('frontend.pages.office', compact('maps', 'districts', 'thanas'));
    }
    function contactPage()
    {
        $maps = Map::get();
        $appointmentSections = Appointment::latest()->limit(5)->get();
        $partners = PartnerSection::latest()->limit(10)->get();
        return view('frontend.pages.contact', compact('maps', 'appointmentSections', 'partners'));
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
