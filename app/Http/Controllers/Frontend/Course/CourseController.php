<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        
        return view('frontend.pages.course.viewAll');
    }
    public function show(Course $course)
    {
        return view('frontend.pages.course.view', compact('course'));
    }

    public function videos()
    {
        return view('frontend.pages.course.showVideos');
    }

   
}
