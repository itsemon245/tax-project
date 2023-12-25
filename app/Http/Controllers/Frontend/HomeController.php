<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\PageName;
use App\Models\CustomService;
use App\Models\Info;
use App\Models\Banner;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\Testimonial;
use App\Models\SocialHandle;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $appointmentSections = Appointment::latest()->take(6)->get();
        $subCategories = ServiceSubCategory::where('service_category_id', 1)->with('serviceCategory')->latest()->take(6)->get();
        // $products = Product::mappedProducts(['product_category_id' => 1]);
        $banners = Banner::latest()->take(6)->get();
        $reviews = Review::latest()->take(6)->get();
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'homepage'])->latest()->take(4)->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'homepage'])->latest()->take(4)->get();
        $achievements = Achievement::latest()->take(12)->get();
        $customServices = CustomService::with('image')->where('page_name', PageName::Home)->latest()->take(6)->get();
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
                'reviews'
            ])
        );
    }
}
