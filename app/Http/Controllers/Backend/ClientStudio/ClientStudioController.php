<?php

namespace App\Http\Controllers\Backend\ClientStudio;

use App\Models\ClientStudio;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientStudioRequest;
use App\Http\Requests\UpdateClientStudioRequest;

class ClientStudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ClientStudio::latest()->get();
        foreach()
        $datum = $data[0]->description;
        return view('backend.clientStudio.client-studio-index', compact('datum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = ClientStudio::latest()->get();
        return view('backend.clientStudio.client-studio-show', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientStudioRequest $request)
    {
        $data = new ClientStudio();
        $data->description = $request->description;
        $data->image = saveImage($request->image, 'client-studio', 'client-studio-img'); 
        $data->title = $request->title;
        $data->count = $request->count;
        $data->save();
        $notification = array(
            'message' => "Added Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(ClientStudio $clientStudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientStudio $clientStudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientStudioRequest $request, ClientStudio $clientStudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientStudio $clientStudio)
    {
        //
    }
}
