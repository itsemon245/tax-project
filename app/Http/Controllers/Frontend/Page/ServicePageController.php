<?php

namespace App\Http\Controllers\Frontend\Page;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ServicePageController extends Controller
{
    public function taxService()
    {
        $productCategory = ProductCategory::with('productSubCategories', "productSubCategories.products")->find(1);
        return view('frontend.pages.services.taxService', compact('productCategory'));
    }

    public function serviceSub()
    {
        return view('frontend.pages.services.subCategory');
    }
}
