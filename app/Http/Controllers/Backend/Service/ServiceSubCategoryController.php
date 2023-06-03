<?php

namespace App\Http\Controllers\Backend\Service;

use App\Models\ServiceSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceSubCategoryRequest;
use App\Http\Requests\UpdateServiceSubCategoryRequest;

class ServiceSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.service.subCategory');
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

        $SubCategory = new ServiceSubCategory();
        $SubCategory->image = saveImage($request->image, 'avatar', 'user-image'); //This will return "uploads/avatar/user-image-154xxxxx.png"
        $SubCategory->save();
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
