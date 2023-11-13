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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomServiceRequest $request, CustomService $customService)
    {
        $service = $this->service->update(CustomServiceDto::transformRequest($request), $customService);
        return view('backend.service.custom.edit', compact('service'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomService $customService)
    {
        $this->service->delete($customService);
        return redirect(route('custom-service.index'))->with([
            'alert-type' => 'success',
            'message'    => 'Custom Service Deleted!'
        ]);
    }
}
