<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendAppoinmentController extends Controller
{
    public function create()
    {
        $testimonials = Testimonial::get();
        return view('frontend.pages.appoinment.create-appoinment', compact('testimonials'));
    }
}
