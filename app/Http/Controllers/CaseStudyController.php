<?php

namespace App\Http\Controllers;

use App\Models\CaseStudyPackage;
use App\Http\Requests\StoreCaseStudyPageRequest;
use App\Http\Requests\UpdateCaseStudyPageRequest;
use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    function caseStudy() {
        return view('frontend.pages.course.caseStudy');
    }

    public function index()
    {
        return view('frontend.pages.course.caseStudyPackegeCategories');
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.caseStudy.caseStudyIndex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseStudyPageRequest $request)
    {
        $request->validate([
            'title' => 'required|max:50|string',
            'page_description' => 'required|max:400|string',
            'image' => 'required|mimes:png,jpg,jpeg|image',
            'duration' => 'required',
            'type' => 'required',
            'orders' => 'required',
            'rate' => 'required',
        ]);
        $caseStudy = new CaseStudy();
        $caseStudy->title = $request->title;
        $caseStudy->page_description = $request->page_description;
        $caseStudy->duration = $request->duration;
        $caseStudy->type = $request->type;
        $caseStudy->orders = $request->orders;
        $caseStudy->rate = $request->rate;
        $caseStudy->image = saveImage($request->image, 'page/caseStudy', 'case-study');
        $caseStudy->save();
        $notification = [
            'message' => 'Case Study Created',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('frontend.pages.course.caseStudySingleCategory');
    }

}
