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

class PageController extends Controller {
    public function trainingPage() {
        return view('frontend.pages.training');
    }

    public function industriesPage() {
        $subCategories = ServiceSubCategory::with('serviceCategory')->where('service_category_id', 3)->latest()->get();
        $achievements = Achievement::latest()->latest()->get();
        $partners = PartnerSection::latest()->limit(10)->latest()->get();
        $customServices = CustomService::with('image')->where('page_name', PageName::Account)->latest()->get();
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'account'])->latest()->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'account'])->latest()->get();

        return view('frontend.pages.industries.industries', compact('subCategories', 'achievements', 'partners', 'customServices', 'infos1', 'infos2'));
    }

    public function clientStudioPage() {
        $data = ClientStudio::get();
        $description = $data[0]->description;
        $appointmentSections = Appointment::latest()->limit(5)->latest()->get();
        $banners = Banner::latest()->limit(10)->latest()->get();
        $partners = PartnerSection::latest()->limit(10)->latest()->get();

        return view('frontend.pages.clientStudio.clientStudio', compact('data', 'description', 'appointmentSections', 'banners', 'partners'));
    }

    private function appointmentDates(?int $userId, ?int $fallbackUserId): array {
        $timeRows = AppointmentTime::whereIn('user_id', array_values(array_unique(array_filter([$userId, $fallbackUserId]))))
            ->get()
            ->groupBy('user_id')
            ->map(fn ($times) => $times->keyBy('day'));
        $userTimes = $timeRows->get($userId, collect());
        $fallbackTimes = $timeRows->get($fallbackUserId, collect());
        $carbon = now('Asia/Dhaka')->subDays(4)->locale('en_BD');

        $dates = [];
        for ($i = 1; $i <= 7; ++$i) {
            $date = $carbon->addDay();
            $times = $userTimes->get($date->format('l'))?->times;
            $dates[$date->format('l, F d, Y')] = !empty($times)
                ? $times
                : ($fallbackTimes->get($date->format('l'))?->times ?? []);
        }

        return $dates;
    }

    private function branchQuery(?ExpertProfile $expertProfile, ?User $admin): Builder {
        if ($expertProfile?->map_id) {
            return Map::query()->whereKey($expertProfile->map_id);
        }

        if ($expertProfile) {
            return Map::query()->where('user_id', $expertProfile->user_id);
        }

        return Map::query()->where(function (Builder $query) use ($admin) {
            $query->where('user_id', $admin?->id)->orWhereNull('user_id');
        });
    }

    public function appointmentPage(Request $request, ?ExpertProfile $expertProfile = null) {
        $admin = User::role('super admin')->first();
        $dates = $this->appointmentDates($expertProfile?->user_id ?? $admin?->id, $admin?->id);
        $branches = $this->branchQuery($expertProfile, $admin);
        $branchDistricts = (clone $branches)->select('district')->distinct()->orderBy('district')->pluck('district');
        $defaultDistrict = $request->query('branch-district') ?: $branchDistricts->first();
        $office = $request->filled('office_id') ? (clone $branches)->find($request->query('office_id')) : null;
        $maps = $office
            ? collect([$office])
            : (clone $branches)
                ->when($defaultDistrict, fn (Builder $query) => $query->where('district', $defaultDistrict))
                ->when(!$request->query('dist_only', false) && $request->query('branch-thana'), fn (Builder $query) => $query->where('thana', $request->query('branch-thana')))
                ->latest()
                ->get();
        $branchThanas = (clone $branches)
            ->when($defaultDistrict, fn (Builder $query) => $query->where('district', $defaultDistrict))
            ->select('thana')
            ->distinct()
            ->orderBy('thana')
            ->pluck('thana');
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->latest()->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->latest()->get();
        $locations = config('locations.districts');

        return view('frontend.pages.appointment.makeAppointment', compact('dates', 'banners', 'expertProfile', 'infos1', 'testimonials', 'maps', 'branchDistricts', 'branchThanas', 'office', 'locations'));
    }

    public function appointmentVirtual(Request $request, ?ExpertProfile $expertProfile = null) {
        $admin = User::role('super admin')->first();
        $dates = $this->appointmentDates($expertProfile?->user_id ?? $admin?->id, $admin?->id);
        $office = $request->filled('office_id')
            ? $this->branchQuery($expertProfile, $admin)->find($request->query('office_id'))
            : null;
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->latest()->get();
        $testimonials = \App\Models\Review::with('user')->latest()->limit(10)->latest()->get();
        $locations = config('locations.districts');

        return view('frontend.pages.appointment.makeAppointmentVirtual', compact('dates', 'banners', 'expertProfile', 'testimonials', 'infos1', 'office', 'locations'));
    }

    public function aboutPage() {
        $about = About::first();

        return view('frontend.pages.about', compact('about'));
    }

    public function officePage(Request $request) {
        $admin = User::role('super admin')->first();
        $maps = Map::where(function (Builder $q) use ($request, $admin) {
            if (!$request->query('dist_only', false) && $request->query('thana')) {
                $q->where('thana', $request->query('thana'));
            }
            if ($request->query('district', 'Chattogram')) {
                $q->where('district', $request->query('district', 'Chattogram'));
            }
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });
        })->latest()->get();
        $districts = Map::select(['district'])->distinct()
        ->where(function (Builder $q) use ($admin) {
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });
        })->latest()->get()->unique('district')->pluck('district');
        $thanas = Map::where(function (Builder $q) use ($request, $admin) {
            if (!empty($request->query('district'))) {
                $q->where('district', $request->query('district'));
            }
            $q->where(function (Builder $builder) use ($admin) {
                $builder->where('user_id', $admin->id)->orWhere('user_id', null);
            });
        })->select(['district', 'thana'])->distinct()->latest()->get()->unique('thana')->pluck('thana');

        return view('frontend.pages.office', compact('maps', 'districts', 'thanas'));
    }

    public function contactPage() {
        $maps = Map::get();
        $appointmentSections = Appointment::latest()->limit(5)->latest()->get();
        $partners = PartnerSection::latest()->limit(10)->latest()->get();

        return view('frontend.pages.contact', compact('maps', 'appointmentSections', 'partners'));
    }

    public function becomePartnerPage() {
        $user = auth()->user();

        return view('frontend.pages.becomePartner', compact('user'));
    }

    // promo codes view page
    public function PromoCodePage() {
        $user_id = Auth::user()->id;
        $promoCodes = User::find($user_id)->promoCodes()->where('status', 1)->latest()->latest()->get();

        return view('frontend.pages.promoCodesPage', compact('promoCodes'));
    }

    // notification client side view page
    public function notificationPage() {
        return view('frontend.pages.notificationPage');
    }

    // show all my courses in frontend
    public function myCourses() {
        $user = User::where('id', auth()->id())->first();
        $courses = $user->purchased('course');

        return view('frontend.pages.myCourses', compact('courses'));
    }

    // show all my case studies in frontend
    public function myCaseStudies() {
        $user = User::where('id', auth()->id())->first();
        $packages = $user->purchased('caseStudyPackage');
        $studies = $user->purchased('caseStudy');

        return view('frontend.pages.myCaseStudies', compact('packages', 'studies'));
    }

    // show all my payments/payment history in frontend
    public function myPayments() {
        $payments = User::find(auth()->id())->purchases()->latest()->get();

        // dd($payments);
        return view('frontend.pages.myPayments', compact('payments'));
    }

    // Contact Developers page:
    public function contactDevelopers() {
        return view('frontend.pages.contact-developers');
    }

    // shwo payment history
    public function myPaymentShow($id) {
        $history = Purchase::find($id)->where('user_id', auth()->id())->first();

        return view('frontend.pages.myPaymentShow', compact('history'));
    }
}
