<?php

namespace App\Http\Controllers\Backend\ClientStudio;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientStudioRequest;
use App\Http\Requests\UpdateClientStudioRequest;
use App\Models\ClientStudio;

class ClientStudioController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = ClientStudio::latest()->latest()->paginate(paginateCount());

        return view('backend.clientStudio.client-studio-index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $data = ClientStudio::latest()->latest()->get();

        return view('backend.clientStudio.client-studio-show', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientStudioRequest $request) {
        $data = new ClientStudio();
        $data->description = $request->description;
        $data->image = saveImage($request->image, 'client-studio', 'client-studio-img');
        $data->title = $request->title;
        $data->count = $request->count;
        $data->save();
        $notification = [
            'message' => 'Added Successfully',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientStudio $clientStudio) {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientStudio $clientStudio) {
        return view('backend.clientStudio.client-studio-edit', compact('clientStudio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientStudioRequest $request, ClientStudio $clientStudio) {
        $oldImagePath = $clientStudio->image;
        $clientStudio->description = $request->description;
        $clientStudio->image = updateFile($request->image, $oldImagePath, 'client-studio', 'client-studio-img');
        $clientStudio->title = $request->title;
        $clientStudio->count = $request->count;
        $clientStudio->update();
        $notification = [
            'message' => 'Updated Successfully',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientStudio $clientStudio) {
        $clientStudio->delete();
        $notification = [
            'message' => 'Deleted Successfully',
            'alert-type' => 'success',
        ];

        return back()->with($notification);
    }
}
