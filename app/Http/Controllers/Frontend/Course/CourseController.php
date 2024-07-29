<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Video;

class CourseController extends Controller {
    public function index() {
        $courses = Course::take(6)->latest()->get();

        return view('frontend.pages.course.viewAll', compact('courses'));
    }

    public function show(Course $course) {
        return view('frontend.pages.course.view', compact('course'));
    }

    public function videos(int $course) {
        $course = Course::withAvg('reviews', 'rating')
            ->withCount('reviews')->find($course);
        $videos = Video::with('users')
            ->where('course_id', $course->id)->latest()->get()->groupBy('section');
        $reviews = $course->reviews;
        $user = request()->user();
        $canReview = $user ? null !== $user->purchased('course')->find($course->id) : false;
        $descriptions = Video::where('course_id', $course->id)->latest()->get();

        return view('frontend.pages.course.showVideos', compact('videos', 'course', 'reviews', 'canReview', 'descriptions'));
    }
}
