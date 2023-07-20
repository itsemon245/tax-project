<?php

namespace App\Http\Controllers;

use App\Models\CaseStudyPackage;
use App\Http\Requests\StoreCaseStudyPageRequest;
use App\Http\Requests\UpdateCaseStudyPageRequest;

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
    public function show()
    {
        return view('frontend.pages.course.caseStudySingleCategory');
    }

}
