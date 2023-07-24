<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    function choose() {
        return view('frontend.pages.product.chooseIncome');
    }
}
