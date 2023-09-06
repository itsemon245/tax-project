<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->simplePaginate(paginateCount(20));
        return view('backend.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $page_cards = [];
        $page_learn_more = [
            'description' => $request->learn_more_description,
            'images' => $this->saveFiles($request->learn_more_images, 'course/learn-more')
        ];
        $page_topics = [
            'description' => $request->explore_topic_description,
            'lists' => $request->explore_topic_lists
        ];
        // push page cards
        foreach ($request->page_card_titles as $key => $value) {
            $card = [
                'title' => $request->page_card_titles[$key],
                'description' => $request->page_card_descriptions[$key],
            ];
            $page_cards[] = $card;
        }

        $course = Course::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'preview' => $request->preview,
            'includes' => $request->course_includes,
            'graduates_receive' => $request->graduate_receives,
            'page_title' => $request->page_title,
            'page_banner' => saveImage($request->page_banner, 'course/banner'),
            'page_cards' => $page_cards,
            'page_learn_more' => $page_learn_more,
            'page_topics' => $page_topics,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Course Created Successfully'
        ];

        return back()->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('backend.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('backend.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        // dd($request->all());
        $page_cards = [];
        $images = [];
        if ($request->learn_more_images) {
            foreach ($request->learn_more_images as $key => $image) {
                $item = updateFile($image, $course->page_learn_more->images[$key], 'course/learn-more');
                $images[] = $item;
            }
        } else {
            $images = $course->page_learn_more->images;
        }
        $page_learn_more = [
            'description' => $request->learn_more_description,
            'images' => $images
        ];
        $page_topics = [
            'description' => $request->explore_topic_description,
            'lists' => $request->explore_topic_lists
        ];
        // push page cards
        foreach ($request->page_card_titles as $key => $value) {
            $card = [
                'title' => $request->page_card_titles[$key],
                'description' => $request->page_card_descriptions[$key],
            ];
            $page_cards[] = $card;
        }

        $course->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'preview' => $request->preview,
            'includes' => $request->course_includes,
            'graduates_receive' => $request->graduate_receives,
            'page_title' => $request->page_title,
            'page_banner' => updateFile($request->page_banner, $course->page_banner, 'course/banner'),
            'page_cards' => $page_cards,
            'page_learn_more' => $page_learn_more,
            'page_topics' => $page_topics,
        ]);
        $alert = [
            'alert-type' => 'success',
            'message' => 'Course Updated Successfully'
        ];
        return redirect(route('course.backend.index'))->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with([
            'alert-type' => 'success',
            'message' => 'Course Deleted Successfully'
        ]);
    }

    function saveFiles(array $files, string $dir, string $prefix = '', string $disk = 'public')
    {
        $paths = [];
        foreach ($files as $key => $file) {
            $path = saveImage($file, $dir, $prefix, $disk);
            $paths[] = $path;
        }
        return $paths;
    }


}
