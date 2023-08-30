<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Service;
use App\Models\ServiceSubCategory;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

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
        $service = Service::first();
        return view('backend.service.createService', compact('subCategory', 'service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $service = new Service();
        $service->service_category_id = $request->service_category_id;
        $service->service_sub_category_id = $request->service_sub_category_id;
        $service->title = $request->title;
        $service->intro = $request->intro;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->price_description = $request->price_description;
        $service->discount = $request->discount;
        $service->is_discount_fixed = $request->discount_type;
        $service->delivery_date = $request->delivery_date;
        $service->rating = $request->ratting;
        $service->reviews = $request->reviews;
        $service->save();
        $this->setSections($request, $service, 'Service');
        $notification = [
            'message' => 'Service Created',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
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
        $service->update([
            'image' => updateFile($request->image, $service->image, 'sections/service'),
        ]);
        $this->setSections($request, $service, 'Service');
        $notification = [
            'message' => 'Service Updated',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
       $service->delete();
       $notification = [
        'message' => 'Service Deleted',
        'alert-type' => 'success',
    ];
    return redirect()
        ->back()
        ->with($notification);
    }

    public function setSections($request, $model, string $modelName)
    {
        if ($request->section_titles) {
            $dir = str($modelName)->slug();
            $dir = str($dir)->plural();
            foreach ($request->section_titles as $key => $title) {
                $image = null;
                $description = $request->section_descriptions[$key];
                $sectionId = $request->section_ids[$key] ?? null;
                $oldSection = $model->sections->find($sectionId);
                $img = $request->section_images[$key] ?? null;
                if ($img !== null && $oldSection !== null) {
                    $image = updateFile($img, $oldSection->image, $dir);
                }
                if ($img === null && $oldSection !== null) {
                    $image = $oldSection->image;
                }
                if ($img !== null && $oldSection === null) {
                    $image = saveImage($img, $dir);
                }
                $section = Section::updateOrCreate(['id' => $sectionId], [
                    'sectionable_type' => $modelName,
                    'sectionable_id' => $model->id,
                    'title'         => $title,
                    'description'   => $description,
                    'image'         => $image
                ]);
            }
        }
    }
}