<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Info;
use App\Models\Banner;
use App\Models\Appointment;
use App\Models\SocialHandle;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $appointmentSections = Appointment::get();
        $productCategory = ProductCategory::with('productSubCategories', "productSubCategories.products")->find(1);
        $infos1 = Info::where('section_id', 1)->get();
        $infos2 = Info::where('section_id', 2)->get();
        $testimonials = Testimonial::get();
        $socials = SocialHandle::get();
        return view('frontend.pages.welcome', compact('appointmentSections', 'infos1', 'infos2', 'socials', 'productCategory', 'testimonials'));
    }
}
