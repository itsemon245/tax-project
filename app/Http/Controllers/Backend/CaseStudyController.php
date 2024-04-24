<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\CaseStudyCategory;
use App\Models\CaseStudyPackage;
use Illuminate\Http\Request;

class CaseStudyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:read case study', [
            'only' => ['index']
        ]);
        $this->middleware('can:manage case study', [
            'except' => ['index']
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CaseStudy::with('caseStudyCategory', 'caseStudyPackage')->latest()->paginate(paginateCount());
        return view('backend.case-study.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $caseStudyPackage = CaseStudyPackage::latest()->get();
        $caseStudyCategories = CaseStudyCategory::latest()->get();
        return view('backend.case-study.create', compact('caseStudyPackage', 'caseStudyCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'case_study_category_id' => 'required',
            'case_study_package_id' => 'required',
            'name' => 'required',
            'intro' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
            'download_link' => 'required',
        ]);

        $caseStudy = new CaseStudy();
        $caseStudy->case_study_category_id = $request->case_study_category_id;
        $caseStudy->case_study_package_id = $request->case_study_package_id;
        $caseStudy->name = $request->name;
        $caseStudy->intro = $request->intro;
        $caseStudy->image = saveImage($request->image, 'case-study/banners');
        $caseStudy->description = $request->description;
        $caseStudy->price = $request->price;
        $caseStudy->download_link =  saveImage($request->download_link, 'case-study/files');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $caseStudy = CaseStudy::find($id);
        $caseStudyPackage = CaseStudyPackage::latest()->get();
        $caseStudyCategory = CaseStudyPackage::find($caseStudy->case_study_package_id)->caseStudyCategories;
        return view('backend.case-study.edit', compact('caseStudyCategory', 'caseStudyPackage', 'caseStudy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'case_study_category_id' => 'required',
            'case_study_package_id' => 'required',
            'name' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $caseStudy = CaseStudy::find($id);
        $caseStudy->case_study_category_id = $request->case_study_category_id;
        $caseStudy->case_study_package_id = $request->case_study_package_id;
        $caseStudy->name = $request->name;
        $caseStudy->intro = $request->intro;
        if ($request->hasFile('image')) {
            $caseStudy->image = updateFile($request->image, $caseStudy->image, 'case-study/banners');
        }
        $caseStudy->description = $request->description;
        $caseStudy->price = $request->price;
        if ($request->hasFile('download_link')) {
            $caseStudy->download_link =  updateFile($request->download_link, $caseStudy->download_link, 'case-study/files');
        }
        $caseStudy->save();

        $notification = [
            'message' => 'Case Study Updated',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = CaseStudy::find($id);
        deleteFile($delete->image);
        deleteFile($delete->download_link);
        $delete->delete();

        $notification = [
            'message' => 'Case Study Deleted',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
