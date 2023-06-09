<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Info;
use App\Models\Banner;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\SocialHandle;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $appointmentSections = Appointment::get();
        $productCategory = ProductCategory::with('productSubCategories', "productSubCategories.products")->find(1);
        $subCategories = ServiceSubCategory::where('service_category_id', 1)->with('serviceCategory')->get();
        $banners = getRecords('banners');
        $infos1 = Info::where('section_id', 1)->get();
        $infos2 = Info::where('section_id', 2)->get();
        $testimonials = Testimonial::get();
        return view('frontend.pages.welcome', compact('banners','appointmentSections', 'infos1', 'infos2', 'productCategory', 'testimonials', 'subCategories'));
    }
}
