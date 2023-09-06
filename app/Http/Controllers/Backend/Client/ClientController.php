<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients= Client::latest()->simplePaginate(paginateCount(20));
        return view('backend.client.view-client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.client.create-client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $client_store= new Client();
        $client_store->name= $request->client_name;
        $client_store->father_name= $request->father_name;
        $client_store->mother_name= $request->mother_name;
        $client_store->company_name= $request->company_name;
        $client_store->spouse_name= $request->husband_wife_name;
        $client_store->present_address= $request->present_address;
        $client_store->permanent_address= $request->parmentat_address;
        $client_store->phone= $request->phone;
        $client_store->tin= $request->tin;
        $client_store->circle= $request->circle;
        $client_store->zone= $request->zone;

        $client_store->save();
        
        $notification = [
            'message' => 'Client Created',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('backend.client.edit-client',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->name= $request->client_name;
        $client->father_name= $request->father_name;
        $client->mother_name= $request->mother_name;
        $client->company_name= $request->company_name;
        $client->spouse_name= $request->husband_wife_name;
        $client->present_address= $request->present_address;
        $client->permanent_address= $request->parmentat_address;
        $client->phone= $request->phone;
        $client->tin= $request->tin;
        $client->circle= $request->circle;
        $client->zone= $request->zone;

        $client->save();
        
        $notification = [
            'message' => 'Client updated',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $notification = [
            'message' => 'Client Deleted',
            'alert-type' => 'success',
        ];
        return back()
            ->with($notification);
    }
}
