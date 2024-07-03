<?php

namespace App\Http\Controllers;

class ProductPageController extends Controller {
    public function choose() {
        return view('frontend.pages.product.chooseIncome');
    }
}
