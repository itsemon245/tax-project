<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\PageName;
use App\Models\CustomService;
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
use App\Models\Achievement;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $appointmentSections = Appointment::get();
        $subCategories = ServiceSubCategory::where('service_category_id', 1)->with('serviceCategory')->get();
        $products = Product::mappedProducts(['product_category_id' => 1]);
        $banners = getRecords('banners');
        $infos1 = Info::where(['section_id' => 1, 'page_name' => 'homepage'])->get();
        $infos2 = Info::where(['section_id' => 2, 'page_name' => 'homepage'])->get();
        $achievements = Achievement::latest()->get();
        $customServices = CustomService::with('image')->where('page_name', PageName::Home)->get();
        return view(
            'frontend.pages.welcome',
            compact([
                'banners',
                'appointmentSections',
                'infos1',
                'infos2',
                'products',
                'subCategories',
                'achievements',
                'customServices'
            ])
        );
    }
}
