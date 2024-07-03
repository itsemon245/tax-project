<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\PageName;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Appointment;
use App\Models\Banner;
use App\Models\CustomService;
use App\Models\Info;
use App\Models\Product;
use App\Models\ServiceSubCategory;
use App\Models\Testimonial;

class HomeController extends Controller {
    public function index() {
        $appointmentSections = Appointment::latest()->take(6)->latest()->get();
        $subCategories = ServiceSubCategory::where('service_category_id', 1)->with('serviceCategory')->latest()->take(6)->latest()->get();
        // $products = Product::mappedProducts(['product_category_id' => 1]);
        $banners = Banner::latest()->take(6)->latest()->get();
        $reviews = Testimonial::latest()->get();
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'homepage'])->latest()->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'homepage'])->latest()->get();
        $achievements = Achievement::latest()->take(12)->latest()->get();
        $customServices = CustomService::with('image')->where('page_name', PageName::Home)->latest()->get();

        return view(
            'frontend.pages.welcome',
            compact([
                'banners',
                'appointmentSections',
                'infos1',
                'infos2',
                'subCategories',
                'achievements',
                'customServices',
                'reviews',
            ])
        );
    }
}
