<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        return view('frontend.pages.expert.viewExpertProfile');
    }

    public function categories()
    {
        return view('frontend.pages.expert.viewCategories');
    }
}
