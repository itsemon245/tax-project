<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class MCQController extends Controller
{
    public function index()
    {
        $data= Question::latest()->get();
        return view('frontend.pages.mcq.index',compact('data'));
    }
}
