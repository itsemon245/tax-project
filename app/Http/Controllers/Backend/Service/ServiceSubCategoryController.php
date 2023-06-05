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
    public function showAll($id)
    {
        $subCategories = ServiceSubCategory::with('services')->where('service_category_id', $id)->get();
        return view('backend.service.subCategories' , compact('subCategories'));
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceSubCategoryRequest $request)
    {
        $subCategory = new ServicesubCategory();
        $subCategory->service_category = $request->category;
        $subCategory->name = $request->service_sub_category;
        $subCategory->image = saveImage($request->image, 'subcaterogy', 'image'); //This will return "uploads/avatar/user-image-154xxxxx.png"
        $subCategory->description = $request->description;
        $subCategory->save();
        $notification = array(
            'message' => "Added Successfully",
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
