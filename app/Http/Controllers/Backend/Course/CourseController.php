<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.course.index');
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
            'description'=> $request->explore_topic_description,
            'lists'=> $request->explore_topic_lists
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
            'includes' => $request->includes,
            'graduates_receive' => $request->graduates_receive,
            'graduates_receive' => $request->graduates_receive,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function saveFiles(array $files, string $dir, string $prefix = '', string $disk = 'public') {
        $paths = [];
        foreach ($files as $key => $file) {
            $path = saveImage($file, $dir, $prefix, $disk);
            $paths[] = $path;
        }
        return $paths;
    }
}
