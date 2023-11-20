<?php

namespace App\Http\Controllers\Backend\Service;

use App\Enums\PageName;
use Illuminate\Http\Request;
use App\Models\CustomService;
use App\Http\Controllers\Controller;
use App\DTOs\CustomService\CustomServiceDto;
use App\Interfaces\Services\BaseServiceInterface;
use App\Services\CustomService\CustomServiceService;
use App\Http\Requests\CustomService\CustomServiceRequest;

class CustomServiceController extends Controller
{
    public function __construct(protected CustomServiceService $service)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = CustomService::paginate(paginateCount());
        return view('backend.service.custom.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageNames = PageName::cases();
        return view('backend.service.custom.create', compact('pageNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomServiceRequest $request)
    {
        $service = $this->service->store(CustomServiceDto::transformRequest($request));
        $service->saveImage($request->file('image'));
        return redirect(route('custom-service.index'), 201)->with([
            'alert-type' => 'success',
            'message'    => 'Custom Service Created!'
        ]);
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
    public function edit(CustomService $customService)
    {
        $service = $customService;
        $pageNames = ['homepage', 'account'];
        return view('backend.service.custom.edit', compact('service', 'pageNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomServiceRequest $request, CustomService $customService)
    {
        if ($request->has('image')) {
            $image = $request->file('image');
            $customService->updateImage($image, $customService->image->path);
        }
        $service = $this->service->update(CustomServiceDto::transformRequest($request), $customService);
        return redirect(route('custom-service.index'))->with([
            'alert-type' => 'success',
            'message'    => 'Custom Service Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomService $customService)
    {
        $customService->deleteImage($customService->image->path);
        $this->service->delete($customService);
        return redirect(route('custom-service.index'))->with([
            'alert-type' => 'success',
            'message'    => 'Custom Service Deleted!'
        ]);
    }
}
