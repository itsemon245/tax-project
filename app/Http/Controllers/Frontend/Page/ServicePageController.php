<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Info;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class ServicePageController extends Controller
{
    public function subsUnderCategory($id)
    {
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'tax service page'])->take(5)->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'tax service page'])->take(5)->get();
        $appointments = getRecords('appointments');
        $testimonials = getRecords('testimonials');
        $banners = getRecords('banners');
        $serviceCategory = ServiceCategory::with(['serviceSubCategories'])->find($id, ['id', 'name']);
        $subCategories = $serviceCategory->serviceSubCategories;
        return view('frontend.pages.services.subCategories', compact('serviceCategory','subCategories', 'appointments', 'testimonials', 'banners', 'infos1', 'infos2'));
    }

    public function servicesUnderSub($id)
    {
        $services = Service::where('service_sub_category_id', $id)->with('serviceSubCategory')->withAvg('reviews', 'rating')->withCount('reviews')->get();
        return view('frontend.pages.services.index', compact('services'));
    }

    public function service($id)
    {
        $service = Service::find($id);
        return view('frontend.pages.services.singleService', compact('service'));
    }
}
