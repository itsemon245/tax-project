<?php

namespace App\Http\Controllers\Backend\Map;

use App\Models\Map;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMapRequest;
use App\Http\Requests\UpdateMapRequest;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.map.map');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maps = Map::all();
        return view('backend.map.showMaps', compact('maps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapRequest $request)
    {
        $maps = new Map();
        $maps->link = $request->link;
        $maps->address = $request->address;
        $maps->image = saveImage($request->map_image, 'map', 'maps-image'); 
        $maps->save();
        $notification = array(
            'message' => "Added Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        return view('backend.map.showSingleMap', compact('map'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMapRequest $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        $map->delete();
        $notification = array(
            'message' => "Deleted Successfully",
            'alert-type' => 'success',
        );
        return back()->with($notification);

    }


}
