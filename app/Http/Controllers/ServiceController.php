<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Models\ServiceSubCategory;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subCategoryId)
    {
        $services = Service::with(['serviceSubCategory', 'serviceCategory'])->where('service_sub_category_id', $subCategoryId)->get();
        return view('backend.service.viewServices', compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($subCategoryId)
    {
        $subCategory = ServiceSubCategory::find($subCategoryId);
        return view('backend.service.createService', compact('subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
