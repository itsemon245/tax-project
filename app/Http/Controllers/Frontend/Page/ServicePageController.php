<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Info;
use App\Models\Service;
use App\Models\PartnerSection;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class ServicePageController extends Controller
{
    public function subsUnderCategory($id)
    {
        $page_name = match ($id) {
            "1" => 'tax service page',
            "2" => 'vat service page',   
            "3" => 'misc service',   
            // default => 'homepage'  
        };
        $infos1 = Info::where(['section_id' => 1, 'page_name' => $page_name])->take(4)->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => $page_name])->take(4)->get();
        $appointments = getRecords('appointments');
        $testimonials = getRecords('testimonials');
        $banners = getRecords('banners');
        $serviceCategory = ServiceCategory::with(['serviceSubCategories'])->find($id, ['id', 'name']);
        $subCategories = $serviceCategory->serviceSubCategories;
        return view('frontend.pages.services.subCategories', compact('serviceCategory','subCategories', 'appointments', 'testimonials', 'banners', 'infos1', 'infos2'));
    }

    public function servicesUnderSub($id)
    {
        $cat = ServiceSubCategory::find($id)->serviceCategory;
        $page_name = match ((string) $cat->id) {
            "1" => 'tax service page',
            "2" => 'vat service page',   
            "3" => 'misc service',    
            default => 'homepage'  
        };
        $infos1 = Info::where(['section_id' => 1, 'page_name' => $page_name])->take(4)->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => $page_name])->take(4)->get();
        $services = Service::where('service_sub_category_id', $id)->with('serviceSubCategory')->withAvg('reviews', 'rating')->withCount('reviews')->get();
        return view('frontend.pages.services.index', compact('services','infos1', 'infos2'));
    }

    public function service($id)
    {
        $service = Service::find($id);
        $partners       = PartnerSection::latest()->limit(10)->get();
        return view('frontend.pages.services.singleService', compact('service', 'partners'));
    }
}
