<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendAppoinmentController extends Controller
{
    public function create()
    {
        return view('frontend.pages.appoinment.create-appoinment');
    }
}
