<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Info;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutPageController extends Controller
{
    public function index()
    {
        $infos2 = Info::where('section_id', 2)->get();
        $testimonials = Testimonial::get();
        return view('frontend.pages.about', compact('infos2','testimonials'));
    }
    
    public function aboutxyz()
    {
        return view('frontend.pages.about-xyz');
    }
}





