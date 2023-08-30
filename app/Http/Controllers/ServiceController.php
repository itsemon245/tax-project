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
        // $service = Service::create(
        //     [
        //         "service_category_id" => $request->service_category_id,
        //         "service_sub_category_id" => $request->service_sub_category_id,
        //         "title" => $request->title,
        //         "intro" => $request->intro,
        //         "description" => $request->description,
        //         "price" => $request->price,
        //         "price_description" => $request->price_description,
        //         "discount" => $request->discount,
        //         "is_discount_fixed" => $request->discount_type,
        //         "delivery_date" => $request->delivery_date,
        //         "rating" => $request->ratting,
        //         "reviews" => $request->reviews,
        //         "sections" => $this->setSections($request, $service, 'Service'),
        //     ]
        // );
        $service = new Service();
        // dd($request);
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

    public function setSections($request, $model, string $modelName)
    {
        foreach ($request->sections_titles as $key => $title) {
            $image = null;
            $description = $request->sections_descriptions[$key];
            $sectionId = $request->section_ids[$key] ?? null;
            $oldSection = $model->sections->find($sectionId);
            $img = $request->section_images[$key] ?? null;
            if ($img !== null && $oldSection !== null) {
                $image = updateFile($img, $oldSection->image, 'industries');
            }
            if ($img === null && $oldSection !== null) {
                $image = $oldSection->image;
            }
            if ($img !== null && $oldSection === null) {
                $image = saveImage($img, 'industries');
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