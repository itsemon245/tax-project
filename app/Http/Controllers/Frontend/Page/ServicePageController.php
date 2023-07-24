<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class ServicePageController extends Controller
{
    public function subsUnderCategory($id)
    {
        $infos1 = getRecords('infos', ['section_id', 1]);
        $infos2 = getRecords('infos', ['section_id', 2]);
        $appointments= getRecords('appointments');
        $testimonials = getRecords('testimonials');
        $banners = getRecords('banners');
        $isTaxServices = str(url()->current())->contains('service/category/1');
        $products = null;
        if ($isTaxServices) {
            $products = Product::mappedProducts(['product_category_id' => 2]);
        }
        $subCategories = ServiceSubCategory::where('service_category_id', $id)->with('serviceCategory')->get();
        return view('frontend.pages.services.subCategories', compact('products','isTaxServices', 'subCategories', 'appointments', 'testimonials', 'banners', 'infos1', 'infos2'));
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
