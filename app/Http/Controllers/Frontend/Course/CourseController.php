<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::get();
        return view('frontend.pages.course.viewAll', compact('courses'));
    }
    public function show(Course $course)
    {
        return view('frontend.pages.course.view', compact('course'));
    }

    public function videos($id,$courseID)
    {
        $courseVideos= Video::where('course_id',$id)->first();
        $videos= Video::where('course_id',$id)->get();
        //dd($videos);
        return view('frontend.pages.course.showVideos',compact('courseVideos','videos'));
    }

    public function video($id,$course)
    {
        $courseVideos= Video::where('id',$id)->first();
        $videos= Video::where('course_id',$course)->get();
        //dd($videos);
        return view('frontend.pages.course.showVideos',compact('courseVideos','videos'));
    }
}
