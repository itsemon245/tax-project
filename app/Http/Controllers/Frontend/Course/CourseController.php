<?php

namespace App\Http\Controllers\Frontend\Course;

use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return view('frontend.pages.course.viewAll');
    }
    public function show(int $course)
    {
        return view('frontend.pages.course.view');
    }

   
}
