<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCaseStudyPageRequest;
use App\Http\Requests\UpdateCaseStudyPageRequest;
use App\Models\CaseStudyPage;

class CaseStudyController extends Controller
{
    function caseStudy() {
        return view('frontend.pages.course.caseStudy');
    }

    public function packageCategories()
    {
        return view('frontend.pages.course.caseStudyPackegeCategories');
    }

    public function packageCategory()
    {
        return view('frontend.pages.course.caseStudySingleCategory');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseStudyPageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudyPage $caseStudyPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudyPage $caseStudyPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseStudyPageRequest $request, CaseStudyPage $caseStudyPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudyPage $caseStudyPage)
    {
        //
    }
}
