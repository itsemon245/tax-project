<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MCQController extends Controller
{
    public function index()
    {
        return view('frontend.pages.mcq.index');
    }
}
