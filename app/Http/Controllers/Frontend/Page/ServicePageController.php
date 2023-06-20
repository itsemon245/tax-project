<?php

namespace App\Http\Controllers\Frontend\Page;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSubCategory;

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
        $productCategory = null;
        if ($isTaxServices) {
            $productCategory = ProductCategory::with('productSubCategories', "productSubCategories.products")->find(2);
        }
        // dd($productCategory->productSubCategories);
        // dd($productCategory->productSubCategories[0]->products);
        $subCategories = ServiceSubCategory::where('service_category_id', $id)->with('serviceCategory')->get();
        return view('frontend.pages.services.subCategories', compact('productCategory','isTaxServices', 'subCategories', 'appointments', 'testimonials', 'banners', 'infos1', 'infos2'));
    }

    public function servicesUnderSub($id)
    {
        $services = Service::where('service_sub_category_id', $id)->with('serviceSubCategory')->get();
        return view('frontend.pages.services.index', compact('services'));
    }

    public function service($id)
    {
        $service = Service::find($id);
        return view('frontend.pages.services.singleService', compact('service'));
    }
}
