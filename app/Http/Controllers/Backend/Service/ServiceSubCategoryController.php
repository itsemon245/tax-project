<?php

namespace App\Http\Controllers\Backend\Service;

use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceSubCategoryRequest;
use App\Http\Requests\UpdateServiceSubCategoryRequest;

class ServiceSubCategoryController extends Controller
{




    /**
     * Display a listing of the resource depending on category
     */
    public function showAll($categoryId)
    {
        $subCategories = ServiceSubCategory::with('services')->where('service_category_id', $categoryId)->get();
        return view('backend.service.subCategories' , compact('subCategories','categoryId'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = ServiceSubCategory::get();
        return view('backend.service.subCategory' , compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryId)
    {
        return view('backend.service.createSubCategory', compact('categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceSubCategoryRequest $request)
    {
        $subCategory = new ServiceSubCategory();
        $subCategory->service_category = $request->category;
        $subCategory->name = $request->service_sub_category;
        $subCategory->image = saveImage($request->image, 'service/subCategory', 'sub-category'); //This will return "uploads/avatar/user-image-154xxxxx.png"
        $subCategory->description = $request->description;
        $subCategory->save();
        $notification = array(
            'message' => "Created Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceSubCategory $serviceSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceSubCategory $serviceSubCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceSubCategoryRequest $request, ServiceSubCategory $serviceSubCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceSubCategory $serviceSubCategory)
    {
        //
    }
}
