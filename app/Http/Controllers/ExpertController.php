<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        return view('frontend.pages.expertProfile.viewExpertProfile');
    }
}
