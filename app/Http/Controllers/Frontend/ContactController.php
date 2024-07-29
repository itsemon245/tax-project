<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ContactController extends Controller {
    // show contact page
    public function create() {
        return view('frontend.pages.contact');
    }
}
