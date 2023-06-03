<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function trainingPage()
    {
        return view('frontend.pages.training');
    }
}
