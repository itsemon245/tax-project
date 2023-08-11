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
        // dd($services);
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
        $jsonSection = $this->createJsonFile($request->sections_titles, $request->sections_descriptions, $request->sections_images);
        Service::create(
            [
                "service_category_id" => $request->service_category_id,
                "service_sub_category_id" => $request->service_sub_category_id,
                "title" => $request->title,
                "intro" => $request->intro,
                "description" => $request->description,
                "price" => $request->price,
                "price_description" => $request->price_description,
                "discount" => $request->discount,
                "is_discount_fixed" => $request->discount_type,
                "delivery_date" => $request->delivery_date,
                "rating" => $request->ratting,
                "reviews" => $request->reviews,
                "sections" => json_encode($jsonSection),
            ]
        );

        return redirect()
            ->route("service.index", $request->service_sub_category_id)
            ->with(array(
                'message' => "Service Created Successfully",
                'alert-type' => 'success',
            ));
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
        $service = Service::find($service->id);
        return view('backend.service.editService', compact('service'));
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
        Service::find($service->id)->delete();
        return redirect()
            ->back()
            ->with(array(
                'message' => "Service Deleted Successfully",
                'alert-type' => 'success',
            ));
    }

    public function createJsonFile($titles, $descriptions, $images)
    {
        $sections = [];
        foreach ($titles as $index => $title) {
            array_push(
                $sections,
                (object)
                [
                    'title'         => $title,
                    'description'   => $descriptions[$index],
                    'image'         => isset($images[$index]) ? saveImage($images[$index], 'service', 'service') : ''
                ]
            );
        }

        return $sections;
    }
}