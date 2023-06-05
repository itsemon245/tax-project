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
        
        $productCategory = ProductCategory::with('productSubCategories', "productSubCategories.products")->find(1);
        $subCategories = ServiceSubCategory::where('service_category_id', $id)->with('serviceCategory')->get();
        return view('frontend.pages.services.subCategories', compact('productCategory', 'subCategories'));
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
