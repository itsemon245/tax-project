<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function profile()
    {
        return view('frontend.pages.expert.profile');
    }

    public function categories()
    {
        return view('frontend.pages.expert.categories');
    }
    public function browse()
    {
        return view('frontend.pages.expert.browse');
    }
}
