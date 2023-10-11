<?php

namespace App\Http\Controllers\Backend\CaseStudy;

use App\Models\CaseStudyCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCaseStudyCategoryRequest;
use App\Http\Requests\UpdateCaseStudyCategoryRequest;

class CaseStudyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CaseStudyCategory::latest()->paginate(paginateCount());
        return view('backend.case-study-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.case-study-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseStudyCategoryRequest $request)
    {
        $CaseStudyCategoryStore = new CaseStudyCategory();
        $CaseStudyCategoryStore->case_study_category = $request->case_study_category;
        $CaseStudyCategoryStore->save();
        $notification = [
            'message' => 'Case Study Category Created',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudyCategory $caseStudyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CaseStudyCategory $caseStudyCategory)
    {
        return view('backend.case-study-category.edit', compact('caseStudyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseStudyCategoryRequest $request, CaseStudyCategory $caseStudyCategory)
    {
        $caseStudyCategory->case_study_category = $request->case_study_category;
        $caseStudyCategory->save();
        $notification = [
            'message' => 'Case Study Category Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CaseStudyCategory $caseStudyCategory)
    {
        $caseStudyCategory->delete();
        $notification = [
            'message' => 'Case Study Category Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
