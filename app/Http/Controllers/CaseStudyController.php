<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\CaseStudyPackage;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\StoreCaseStudyPageRequest;
use App\Http\Requests\UpdateCaseStudyPageRequest;

class CaseStudyController extends Controller
{
    function caseStudy() {

        $packages = CaseStudyPackage::get();
        return view('frontend.pages.course.caseStudy', compact('packages'));
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


        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datum = CaseStudy::find($id);
        return view('backend.caseStudy.editCaseStudy', compact('datum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseStudyPageRequest $request, CaseStudy $caseStudy)
    {
        $caseStudy->title = $request->title;
        $caseStudy->page_description = $request->page_description;
        $caseStudy->duration = $request->duration;
        $caseStudy->type = $request->type;
        $caseStudy->orders = $request->orders;
        $caseStudy->rate = $request->rate;
        $caseStudy->image = saveImage($request->image, 'page/caseStudy', 'case-study');
        $caseStudy->save();
        $notification = [
            'message' => 'Record Updated',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }


    //Custom method for show all data 
    public function showAll()
    {
        $caseStudies = CaseStudy::get();
        return view('backend.caseStudy.viewCaseStudy', compact('caseStudies'));
    }


    public function destroy($id)
    {
        $datum = CaseStudy::findOrFail($id);
        $datum->delete();
        $notification = [
            'message' => 'Record Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

}
