<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Models\User;
use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Models\Review;

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

    public function videos(int $course)
    {
        $course = Course::withAvg('reviews', 'rating')
            ->withCount('reviews')->find($course);
        $videos = Video::with('users')
            ->where('course_id', $course->id)->get()->groupBy('section');
        $reviews = $course->reviews;
        return view('frontend.pages.course.showVideos', compact('videos', 'course', 'reviews'));
    }
}
