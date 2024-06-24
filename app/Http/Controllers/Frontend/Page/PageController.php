<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Enums\PageName;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Achievement;
use App\Models\Appointment;
use App\Models\AppointmentTime;
use App\Models\Banner;
use App\Models\ClientStudio;
use App\Models\CustomService;
use App\Models\ExpertProfile;
use App\Models\Info;
use App\Models\Map;
use App\Models\PartnerSection;
use App\Models\Purchase;
use App\Models\ServiceSubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function trainingPage()
    {
        return view('frontend.pages.training');
    }
    public function industriesPage()
    {
        $subCategories  = ServiceSubCategory::with('serviceCategory')->where('service_category_id', 3)->latest()->get();
        $achievements   = Achievement::latest()->latest()->get();
        $partners       = PartnerSection::latest()->limit(10)->latest()->get();
        $customServices = CustomService::with('image')->where('page_name', PageName::Account)->latest()->get();
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'account'])->latest()->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'account'])->latest()->get();
        return view('frontend.pages.industries.industries', compact('subCategories', 'achievements', 'partners', 'customServices', 'infos1', 'infos2'));
    }
    public function clientStudioPage()
    {
        $data                = ClientStudio::get();
        $description         = $data[ 0 ]->description;
        $appointmentSections = Appointment::latest()->limit(5)->latest()->get();
        $banners             = Banner::latest()->limit(10)->latest()->get();
        $partners            = PartnerSection::latest()->limit(10)->latest()->get();
        return view('frontend.pages.clientStudio.clientStudio', compact('data', 'description', 'appointmentSections', 'banners', 'partners'));
    }
    public function appointmentPage(Request $request, ?ExpertProfile $expertProfile = null)
    {
        $userId = $expertProfile ? $expertProfile->user_id : User::role('super admin')->first()?->id;
        $carbon = now('Asia/Dhaka')->subDays(4)->locale('en_BD');

        $dates = [];
        for ($i = 1; $i <= 7; $i++) {
            $date = $carbon->addDay();
            $dates[$date->format('l, F d, Y')] = AppointmentTime::where('user_id', $userId)->where('day', $date->format('l'))->first()->times ?? [];
        }
        $office = !empty($request->query('office_id')) ? Map::find($request->query('office_id')) : null;
        $admin = User::role('super admin')->first();
        $defaultDistrict = $expertProfile != null ? $request->query('branch-district', 'Chattogram') : null;
        if ($office == null) {
            $maps = Map::where(function (Builder $q) use ($request, $expertProfile, $admin, $defaultDistrict) {
                if ($request->query('branch-thana')) {
                    $q->where('thana', $request->query('branch-thana'));
                }
                if ($defaultDistrict) {
                    $q->where('district', $defaultDistrict);
                }
                if ($expertProfile != null) {
                    $q->where('user_id', $expertProfile->user_id);
                } else {
                    $q->where(function (Builder $builder) use ($admin) {
                        $builder->where('user_id', $admin->id)->orWhere('user_id', null);
                    });
                }
            })->latest()->get();
        } else {
            $maps = [ $office ];
        }
        $branchDistricts = Map::select([ 'district','user_id' ])
        ->where(function (Builder $q) use ($request, $expertProfile, $admin) {
            if ($expertProfile != null) {
                $q->where('user_id', $expertProfile->user_id);
            } else {
                $q->where(function (Builder $builder) use ($admin) {
                    $builder->where('user_id', $admin->id)->orWhere('user_id', null);
                });
            }
        })
        ->distinct()->latest()->get()->unique('district')->pluck('district');
        $branchThanas    = Map::select([ 'district', 'thana', 'user_id' ])
        ->distinct()
        ->where(function (Builder $q) use ($request, $expertProfile, $admin, $defaultDistrict) {
            if ($defaultDistrict) {
                $q->where('district', $defaultDistrict);
            }
            if ($expertProfile != null) {
                $q->where('user_id', $expertProfile->user_id);
            } else {
                $q->where(function (Builder $builder) use ($admin) {
                    $builder->where('user_id', $admin->id)->orWhere('user_id', null);
                });
            }
        })->latest()->get()->unique('thana')->pluck('thana');
        $banners      = getRecords('banners');
        $infos1       = Info::where('section_id', 1)->latest()->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->latest()->get();
        return view('frontend.pages.appointment.makeAppointment', compact('dates', 'banners', 'expertProfile', 'infos1', 'testimonials', 'maps', 'branchDistricts', 'branchThanas', 'office'));
    }
    public function appointmentVirtual(Request $request, ?ExpertProfile $expertProfile = null)
    {
        $userId = $expertProfile ? $expertProfile->user_id : User::role('super admin')->first()?->id;
        $carbon = now('Asia/Dhaka')->subDays(4)->locale('en_BD');

        $dates = [];
        for ($i = 1; $i <= 7; $i++) {
            $date = $carbon->addDay();
            $dates[$date->format('l, F d, Y')] = AppointmentTime::where('user_id', $userId)->where('day', $date->format('l'))->first()->times ?? [];
        }

        $office = !empty($request->query('office_id')) ? Map::find($request->query('office_id')) : null;
        $banners      = getRecords('banners');
        $infos1       = Info::where('section_id', 1)->latest()->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->latest()->get();
        return view('frontend.pages.appointment.makeAppointmentVirtual', compact('dates', 'banners', 'expertProfile', 'testimonials', 'infos1', 'office'));
    }
    public function aboutPage()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
    public function officePage(Request $request)
    {
        $admin = User::role('super admin')->first();
        $maps = Map::where(function (Builder $q) use ($request, $admin) {
            if ($request->query('thana', 'Karnaphuli')) {
                $q->where('thana', $request->query('thana', 'Karnaphuli'));
            }
            if ($request->query('district', 'Chattogram')) {
                $q->where('district', $request->query('district', 'Chattogram'));
            }
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });
        })->latest()->get();
        $districts = Map::select([ 'district'])->distinct()
        ->where(function (Builder $q) use ($admin) {
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });

        })->latest()->get()->unique('district')->pluck('district');
        $thanas    = Map::where(function (Builder $q) use ($request, $admin) {
            if (!empty($request->query('district'))) {
                $q->where('district', $request->query('district'));
            }
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });
        })->select([ 'district', 'thana'])->distinct()->latest()->get()->unique('thana')->pluck('thana');
        return view('frontend.pages.office', compact('maps', 'districts', 'thanas'));
    }
    public function contactPage()
    {
        $maps                = Map::get();
        $appointmentSections = Appointment::latest()->limit(5)->latest()->get();
        $partners            = PartnerSection::latest()->limit(10)->latest()->get();
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
        $user_id    = Auth::user()->id;
        $promoCodes = User::find($user_id)->promoCodes()->where('status', 1)->latest()->latest()->get();
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
        $user    = User::where('id', auth()->id())->first();
        $courses = $user->purchased('course');
        return view('frontend.pages.myCourses', compact('courses'));
    }
    //show all my case studies in frontend
    public function myCaseStudies()
    {
        $user    = User::where('id', auth()->id())->first();
        $packages = $user->purchased('caseStudyPackage');
        $studies = $user->purchased('caseStudy');
        return view('frontend.pages.myCaseStudies', compact('packages', 'studies'));
    }
    //show all my payments/payment history in frontend
    public function myPayments()
    {
        $payments = User::find(auth()->id())->purchases()->latest()->get();
        // dd($payments);
        return view('frontend.pages.myPayments', compact('payments'));
    }
    //Contact Developers page:
    public function contactDevelopers()
    {
        return view('frontend.pages.contact-developers');
    }

    //shwo payment history
    public function myPaymentShow($id)
    {
        $history = Purchase::find($id)->where('user_id', auth()->id())->first();
        return view('frontend.pages.myPaymentShow', compact('history'));
    }
}
