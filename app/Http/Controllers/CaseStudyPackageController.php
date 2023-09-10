<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Models\CaseStudyPackage;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\StoreCaseStudyPageRequest;
use App\Http\Requests\UpdateCaseStudyPageRequest;
use App\Models\CaseStudyCategory;
use Database\Seeders\CaseStudySeeder;
use Ramsey\Uuid\Type\Integer;

class CaseStudyPackageController extends Controller
{
    function caseStudy()
    {
        
        $packages = CaseStudyPackage::latest()->paginate(2)->get();
        return view('frontend.pages.course.caseStudy', compact('packages'));
    }

    public function index(int $caseStudyPackage)
    {
        $caseStudies = CaseStudyPackage::find($caseStudyPackage)->caseStudies;
        $caseStudycategories = CaseStudyCategory::latest()->get();
        $caseStudyPackages = CaseStudyPackage::latest()->get();
        return view('frontend.pages.course.caseStudyIndex', compact('caseStudyPackages','caseStudycategories','caseStudies'));
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caseStudyData = CaseStudyPackage::first();
        return view('backend.caseStudyPackage.caseStudyIndex', compact('caseStudyData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCaseStudyPageRequest $request)
    {
        $caseStudyData = CaseStudyPackage::first();

        if ($caseStudyData === null) {
            $caseStudy = new CaseStudyPackage();
            $caseStudy->page_title = $request->title;
            $caseStudy->page_description = $request->page_description;
            $caseStudy->billing_type = $request->billing_type;
            $caseStudy->name = $request->name;
            $caseStudy->limit = $request->limit;
            $caseStudy->price = $request->price;
            $caseStudy->page_image = saveImage($request->image, 'page/caseStudy', 'case-study');
            $caseStudy->save();
        } else {
            $caseStudy = new CaseStudyPackage();
            $caseStudy->billing_type = $request->billing_type;
            $caseStudy->name = $request->name;
            $caseStudy->limit = $request->limit;
            $caseStudy->price = $request->price;
            $caseStudy->save();
        }

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
        $datum = CaseStudyPackage::find($id);
        $caseStudyData = CaseStudyPackage::first();
        return view('backend.caseStudyPackage.editCaseStudy', compact('datum', 'caseStudyData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCaseStudyPageRequest $request, $id)
    {
        $caseStudyData = CaseStudyPackage::skip(0)->value('id');
        if ($caseStudyData == $id) {
            $caseStudy = CaseStudyPackage::find($id);
            $caseStudy->page_title = $request->title;
            $caseStudy->page_description = $request->page_description;
            $caseStudy->billing_type = $request->billing_type;
            $caseStudy->name = $request->name;
            $caseStudy->limit = $request->limit;
            $caseStudy->price = $request->price;
            if ($request->hasFile('image')) {
            $caseStudy->page_image = updateFile($request->image, $caseStudy->page_image,'page/caseStudy', 'case-study');
            }
            $caseStudy->save();
        } else {
            $caseStudy = CaseStudyPackage::find($id);
            $caseStudy->billing_type = $request->billing_type;
            $caseStudy->name = $request->name;
            $caseStudy->limit = $request->limit;
            $caseStudy->price = $request->price;
            $caseStudy->save();
        }

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
        $CaseStudyPackages = CaseStudyPackage::all();
        return view('backend.caseStudyPackage.viewCaseStudy', compact('CaseStudyPackages'));
    }

    public function destroy($id)
    {
        $datum = CaseStudyPackage::findOrFail($id);
        $caseStudyData = (string) CaseStudyPackage::skip(0)->value('id');
        if($datum->id == $caseStudyData){
            $caseStudy= CaseStudyPackage::skip(1)->first();
            $caseStudy->page_title = $datum->page_title;
            $caseStudy->page_description = $datum->page_description;
            $caseStudy->page_image = $datum->page_image;
            $caseStudy->save();
        }

        $datum->delete();
        $notification = [
            'message' => 'Record Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
